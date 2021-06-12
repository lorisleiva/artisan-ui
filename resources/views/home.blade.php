@extends('artisan-ui::layout')

@section('content')
    <h1>Hello potato!</h1>

    <ul>
        @foreach($commands as $command)
            <li><a href="/artisan/{{ $command->getName() }}">{{ $command->getName() }}</a></li>
        @endforeach
    </ul>
@endsection
