@php /** @var Lorisleiva\ArtisanUI\CommandOption $input */ @endphp

<div x-model="{{ $input->getAbsoluteKey() }}" class="flex items-center justify-between">
    <span class="flex-grow flex flex-col" id="{{ $input->getName() }}-label">
        <span class="text-sm font-medium text-gray-900">{{ $input->getName() }}</span>
        <span class="text-sm text-gray-500">{{ $input->getDescription() ?? "Activates the \"{$input->getName()}\" option." }}</span>
    </span>

    <button
        type="button"
        class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600"
        :class="{{ $input->getAbsoluteKey() }} ? 'bg-gray-700' : 'bg-gray-200'"
        role="switch"
        aria-checked="false"
        aria-labelledby="{{ $input->getName() }}-label"
        @click="$dispatch('input', ! {{ $input->getAbsoluteKey() }})"
    >
        <span class="sr-only">Toggle setting</span>

        <span
            aria-hidden="true"
            class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
            :class="{{ $input->getAbsoluteKey() }} ? 'translate-x-5' : 'translate-x-0'"
        ></span>
    </button>
</div>
