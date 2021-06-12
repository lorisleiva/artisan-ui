@extends('artisan-ui::layout')

@section('content')
    <h1 class="text-red-500">{{ $command->getName() }}</h1>

    <h2>{{ $command->getDescription() }}</h2>
    <p>{{ $command->getHelp() }}</p>

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
