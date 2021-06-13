<div x-model="{{ $fieldType }}.{{ $name }}" class="flex items-center justify-between">
    <span class="flex-grow flex flex-col" id="{{ $name }}-label">
        <span class="text-sm font-medium text-gray-900">{{ $name }}</span>
        <span class="text-sm text-gray-500">{{ $description ?? "Activates the \"$name\" option." }}</span>
    </span>

    <button
        type="button"
        class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600"
        :class="{{ $fieldType }}.{{ $name }} ? 'bg-gray-700' : 'bg-gray-200'"
        role="switch"
        aria-checked="false"
        aria-labelledby="{{ $name }}-label"
        @click="$dispatch('input', ! {{ $fieldType }}.{{ $name }})"
    >
        <span class="sr-only">Toggle setting</span>

        <span
            aria-hidden="true"
            class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
            :class="{{ $fieldType }}.{{ $name }} ? 'translate-x-5' : 'translate-x-0'"
        ></span>
    </button>
</div>
