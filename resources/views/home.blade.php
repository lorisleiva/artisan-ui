@extends('artisan-ui::layout')
@php /** @var Illuminate\Support\Collection $commands */ @endphp
@php /** @var Lorisleiva\ArtisanUI\Command $command */ @endphp

@section('content')
    @foreach($commands as $namespace => $commandGroup)
        <div x-data="{ open: false }" class="mb-4">
            @include('artisan-ui::partials.accordion-button', [
                'title' => $namespace ?: '--No namespace--',
                'disabled' => false,
            ])
            <ul x-cloak x-show="open" class="space-y-0 py-4">
                @foreach($commandGroup as $command)
                    <li>
                        <a href="{{ route('artisan-ui.detail', $command->getName()) }}" class="block border border-transparent hover:border-gray-300 hover:bg-gray-50 rounded px-4 py-2">
                            <h3 class="font-mono">{{ $command->getName() }}</h3>
                            <p class="text-gray-500 text-sm truncate">{{ $command->getDescription() }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
