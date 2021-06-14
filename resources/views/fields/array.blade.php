@php /** @var Lorisleiva\ArtisanUI\CommandInput $input */ @endphp

<div>
    <label class="flex text-sm text-gray-700 space-x-2">
        <div class="font-medium">{{ $input->getName() }}</div>
        @if($input->isRequired())
            <div class="text-gray-500">•</div>
            <div class="text-gray-500">required</div>
        @endif
        <div class="text-gray-500">•</div>
        <div class="text-gray-500">array</div>
    </label>
    <div class="mt-1 -space-y-px">
        <template x-for="(value, index) in [...({{ $input->getAbsoluteKey() }} || []), '']">
            <input
                :value="value"
                type="text"
                class="relative focus:z-10 shadow-sm focus:ring-gray-600 focus:border-gray-600 block w-full sm:text-sm border-gray-300"
                :class="{
                    'rounded-t-md': index === 0,
                    'rounded-b-md': index === ([...({{ $input->getAbsoluteKey() }} || []), ''].length - 1),
                }"
                placeholder="{{ $input->getDefaultToDisplay() }}"
                @input="event => { updateArrayValue('{{ $input->getType() }}', '{{ $input->getName() }}', event.target.value, index) }"
            >
        </template>
    </div>
    @if(!! $input->getDescription())
        <p class="mt-2 text-sm text-gray-500">
            {{ $input->getDescription() }}
        </p>
    @endif
</div>
