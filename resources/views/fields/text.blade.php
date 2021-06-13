<div>
    <label for="email" class="block text-sm font-medium text-gray-700">{{ $name }}</label>
    <div class="mt-1">
        <input
            x-model="{{ $fieldType }}.{{ $name }}"
            type="text"
            class="shadow-sm focus:ring-gray-600 focus:border-gray-600 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ is_string($default) ? $default : '' }}"
        >
    </div>
    <p class="mt-2 text-sm text-gray-500" x-show="{{ !! ($description ?? null) }}">
        {{ $description ?? '' }}
    </p>
</div>
