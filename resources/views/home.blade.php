@extends('artisan-ui::layout')
@php /** @var Illuminate\Support\Collection $commands */ @endphp
@php /** @var Lorisleiva\ArtisanUI\Command $command */ @endphp

@section('content')
    @foreach($commands as $namespace => $commandGroup)
        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => $namespace,
                'disabled' => false,
            ])
            <ul x-cloak>
                @foreach($commandGroup as $command)
                    <li><a href="{{ route('artisan-ui.detail', $command->getName()) }}">{{ $command->getName() }}</a></li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
