<div>
    <label for="email" class="block text-sm font-medium text-gray-700">{{ $name }}</label>
    <div class="mt-1">
        <input
            type="text"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $default ?? '' }}"
        >
    </div>
    <p class="mt-2 text-sm text-gray-500" x-show="{{ !! ($description ?? null) }}">
        {{ $description ?? '' }}
    </p>
</div>
