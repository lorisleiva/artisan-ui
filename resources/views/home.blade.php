@extends('artisan-ui::layout')
@php /** @var Illuminate\Support\Collection $commands */ @endphp
@php /** @var Lorisleiva\ArtisanUI\Command $command */ @endphp

@section('content')
    <div x-data="{ opened: null }" class="grid grid-cols-4 gap-4 grid-flow-row-dense">
        @foreach($commands as $namespace => $commandGroup)
            <button
                class="px-4 py-2 rounded-md text-sm truncate"
                :class="opened === '{{ $namespace }}' ? 'bg-gray-700 text-white' : 'bg-gray-100 hover:bg-gray-200'"
                @click="opened = opened === '{{ $namespace }}' ? null : '{{ $namespace }}'"
            >
                {{ $namespace ?: '❖' }}
            </button>

            <ul x-cloak x-show="opened === '{{ $namespace }}'" class="space-y-0 py-4 col-span-4 col-start-1">
                @foreach($commandGroup as $command)
                    <li>
                        <a href="{{ route('artisan-ui.detail', $command->getName()) }}" class="block border border-transparent hover:border-gray-300 hover:bg-gray-50 rounded px-4 py-2">
                            <h3 class="font-mono">{{ $command->getName() }}</h3>
                            <p class="text-gray-500 text-sm truncate">{{ $command->getDescription() }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
