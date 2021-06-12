@extends('artisan-ui::layout')
@php /** @var Illuminate\Support\Collection $commands */ @endphp
@php /** @var Illuminate\Console\Command $command */ @endphp

@section('content')
    <h1>Hello potato!</h1>

    <ul>
        @foreach($commands as $command)
            <li><a href="/artisan/{{ $command->getName() }}">{{ $command->getName() }}</a></li>
        @endforeach
    </ul>
@endsection
