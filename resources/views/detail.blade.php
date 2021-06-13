@extends('artisan-ui::layout')
@php /** @var Illuminate\Console\Command $command */ @endphp

@section('content')
    <header class="mb-6">
        <h1 class="text-3xl font-mono">{{ $command->getName() }}</h1>
        <p class="text-gray-700">{{ $command->getDescription() }}</p>
    </header>

    <div x-data="{ open: false }" class="mb-4">
        @include('artisan-ui::partials.accordion-button', [
            'title' => sprintf('Arguments (%s)', count($command->getDefinition()->getArguments()))
        ])

        <ul x-show="open" class="space-y-4 py-4">
            @foreach($command->getDefinition()->getArguments() as $argument)
                <li>
                    @include('artisan-ui::.partials.argument', compact('argument'))
                </li>
            @endforeach
        </ul>
    </div>

    <div x-data="{ open: false }" class="mb-4">
        @include('artisan-ui::partials.accordion-button', [
            'title' => sprintf('Options (%s)', count($command->getDefinition()->getOptions()))
        ])

        <ul x-show="open" class="space-y-4 py-4">
            @foreach($command->getDefinition()->getOptions() as $option)
                <li>
                    @include('artisan-ui::.partials.option', compact('option'))
                </li>
            @endforeach
        </ul>
    </div>

    <button class="px-6 py-2 bg-gray-700 text-white rounded">
        Execute
    </button>
@endsection
