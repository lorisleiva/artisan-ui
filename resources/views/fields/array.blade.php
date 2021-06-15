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
            <div class="relative">
                <input
                    :value="value"
                    type="text"
                    class="relative focus:z-10 shadow-sm focus:ring-gray-600 focus:border-gray-600 block w-full sm:text-sm border-gray-300 pr-10"
                    :class="{
                        'rounded-t-md': index === 0,
                        'rounded-b-md': index === ([...({{ $input->getAbsoluteKey() }} || []), ''].length - 1),
                    }"
                    placeholder="{{ $input->getDefaultToDisplay() }}"
                    @input="event => { updateArrayValue('{{ $input->getType() }}', '{{ $input->getName() }}', event.target.value, index) }"
                >
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center z-20" x-show="index < ([...({{ $input->getAbsoluteKey() }} || []), ''].length - 1)">
                    <button class="text-gray-500 hover:text-gray-700" @click="deleteArrayValue('{{ $input->getType() }}', '{{ $input->getName() }}', index)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </template>
    </div>
    @if(!! $input->getDescription())
        <p class="mt-2 text-sm text-gray-500">
            {{ $input->getDescription() }}
        </p>
    @endif
</div>
