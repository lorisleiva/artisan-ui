@extends('artisan-ui::layout')

@section('content')
    <header class="mb-6">
        <h1 class="text-3xl font-mono">{{ $command->getName() }}</h1>
        <p class="text-gray-700">{{ $command->getDescription() }}</p>
    </header>

    <h3>Arguments</h3>
    <ul>
        @foreach($command->getDefinition()->getArguments() as $argument)
            <li>
                {{ $argument->getName() }}
            </li>
        @endforeach
    </ul>

    <h3>Options</h3>
    <ul>
        @foreach($command->getDefinition()->getOptions() as $option)
            <li>
                {{ $option->getName() }}
            </li>
        @endforeach
    </ul>
@endsection
