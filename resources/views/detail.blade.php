@extends('artisan-ui::layout')
@php /** @var Illuminate\Console\Command $command */ @endphp

@section('content')
    <div x-data="command">
        <header class="mb-6">
            <h1 class="text-3xl font-mono">{{ $command->getName() }}</h1>
            <p class="text-gray-700">{{ $command->getDescription() }}</p>
        </header>

        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => sprintf('Arguments (%s)', count($command->getDefinition()->getArguments())),
                'disabled' => empty($command->getDefinition()->getArguments()),
            ])

            @unless(empty($command->getDefinition()->getArguments()))
                <ul x-show="open" class="space-y-4 py-4">
                    @foreach($command->getDefinition()->getArguments() as $argument)
                        <li>
                            @include('artisan-ui::.partials.argument', compact('argument'))
                        </li>
                    @endforeach
                </ul>
            @endunless
        </div>

        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => sprintf('Options (%s)', count($command->getDefinition()->getOptions())),
                'disabled' => empty($command->getDefinition()->getOptions()),
            ])

            @unless(empty($command->getDefinition()->getOptions()))
                <ul x-show="open" class="space-y-4 py-4">
                    @foreach($command->getDefinition()->getOptions() as $option)
                        <li>
                            @include('artisan-ui::.partials.option', compact('option'))
                        </li>
                    @endforeach
                </ul>
            @endunless
        </div>

        <button
            class="relative px-6 py-2 bg-gray-700 text-white rounded"
            :disabled="state === 'loading'"
            @click="execute"
        >
            <div x-show="state === 'loading'" x-cloak class="absolute inset-0 bg-gray-500 text-white rounded flex items-center justify-center cursor-not-allowed">
                <svg class="animate-spin w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-100" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            <div>Execute</div>
        </button>

        <pre class="mt-16 bg-gray-700 text-white rounded p-8" x-text="output"></pre>
    </div>

    <script>
        document.addEventListener('alpine:initializing', () => {
            Alpine.data('command', () => ({
                state: 'idle',
                arguments: {!!
                    collect($command->getDefinition()->getArguments())
                        ->mapWithKeys(fn ($value) => [$value->getName() => null])
                        ->toJson()
                !!},
                options: {!!
                    collect($command->getDefinition()->getOptions())
                        ->mapWithKeys(fn ($value) => [$value->getName() => null])
                        ->toJson()
                !!},
                route: '{{ route('artisan-ui.execution', $command->getName()) }}',
                output: '',

                execute () {
                    if (this.state === 'loading') return
                    this.state = 'loading'

                    axios.post(this.route)
                        .then(this.onSuccess.bind(this))
                        .catch(this.onFailure.bind(this))
                },

                onSuccess (response) {
                    this.output = response.data.output || ''
                    this.state = response.data.success ? 'success' : 'error'
                },

                onFailure (error) {
                    this.output = error.response.data.message || 'Something went wrong'
                    this.state = 'error'
                },
            }))
        })
    </script>
@endsection
