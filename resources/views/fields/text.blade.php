@php /** @var Lorisleiva\ArtisanUI\CommandInput $input */ @endphp

<div>
    <label for="email" class="block text-sm font-medium text-gray-700">{{ $input->getName() }}</label>
    <div class="mt-1">
        <input
            x-model="{{ $input->getAbsoluteKey() }}"
            type="text"
            class="shadow-sm focus:ring-gray-600 focus:border-gray-600 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $input->getDefaultToDisplay() }}"
        >
    </div>
    <p class="mt-2 text-sm text-gray-500" x-show="{{ !! $input->getDescription() }}">
        {{ $input->getDescription() }}
    </p>
</div>
