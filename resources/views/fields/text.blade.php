@php /** @var Lorisleiva\ArtisanUI\CommandInput $input */ @endphp

<div>
    <label class="flex text-sm text-gray-700 space-x-2">
        <div class="font-medium">{{ $input->getName() }}</div>
        @if($input->isRequired())
            <div class="text-gray-500">•</div>
            <div class="text-gray-500">required</div>
        @endif
    </label>
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
