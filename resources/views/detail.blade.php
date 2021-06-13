@extends('artisan-ui::layout')
@php /** @var Lorisleiva\ArtisanUI\Command $command */ @endphp
@php /** @var Lorisleiva\ArtisanUI\CommandArgument $argument */ @endphp
@php /** @var Lorisleiva\ArtisanUI\CommandOption $option */ @endphp

@section('content')
    <div x-data="command">
        <header class="mb-6">
            <h1 class="text-3xl font-mono">{{ $command->getName() }}</h1>
            <p class="text-gray-700">{{ $command->getDescription() }}</p>
        </header>

        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => sprintf('Arguments (%s)', $command->getArgumentCount()),
                'disabled' => ! $command->hasArguments(),
            ])

            @if($command->hasArguments())
                <ul x-cloak x-show="open" class="space-y-4 py-4">
                    @foreach($command->getArguments() as $argument)
                        <li>
                            @if($argument->isArray())
                                {{-- TODO --}}
                                @include('artisan-ui::fields.text', ['input' => $argument])
                            @else
                                @include('artisan-ui::fields.text', ['input' => $argument])
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => sprintf('Options (%s)', $command->getOptionCount()),
                'disabled' => ! $command->hasOptions(),
            ])

            @if($command->hasOptions())
                <ul x-cloak x-show="open" class="space-y-4 py-4">
                    @foreach($command->getOptions() as $option)
                        <li>
                            @if($option->isBoolean())
                                @include('artisan-ui::fields.boolean', ['input' => $option])
                            @elseif($option->isArray())
                                {{-- TODO --}}
                                @include('artisan-ui::fields.text', ['input' => $option])
                            @else
                                @include('artisan-ui::fields.text', ['input' => $option])
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex space-x-8 items-center">
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
            <div x-cloak x-show="state === 'success'" class="flex items-center justify-center space-x-2 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div>Success</div>
            </div>
            <div x-cloak x-show="state === 'error'" class="flex items-center justify-center space-x-2 text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <div>Error</div>
            </div>
        </div>

        <div x-cloak x-show="state === 'success' || state === 'error'">
            <pre class="mt-16 bg-gray-700 text-white rounded p-8" x-text="output"></pre>
            <div class="flex justify-end mt-1">
                <button class="text-xs font-semibold text-gray-400 hover:text-gray-600 hover:underline" @click="clear">Clear</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:initializing', () => {
            Alpine.data('command', () => ({
                state: 'idle',
                arguments: {!! $command->getArgumentsAsJson() !!},
                options: {!! $command->getOptionsAsJson() !!},
                route: '{{ route('artisan-ui.execution', $command->getName()) }}',
                output: '',

                execute () {
                    if (this.state === 'loading') return
                    this.state = 'loading'
                    const payload = {
                        arguments: this.arguments,
                        options: this.options,
                    }

                    axios.post(this.route, payload)
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

                clear () {
                    this.state = 'idle'
                    this.output = ''
                },
            }))
        })
    </script>
@endsection
