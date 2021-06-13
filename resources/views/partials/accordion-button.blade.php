@if($disabled ?? false)
    <div class="w-full flex justify-between items-center bg-gray-100 px-2 py-1 rounded text-sm">
        {{ $title }}
    </div>
@else
    <button @click="open = ! open" class="w-full flex justify-between items-center bg-gray-100 px-2 py-1 rounded text-sm hover:bg-gray-200">
        <div>{{ $title }}</div>
        <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
        <svg x-cloak x-show="! open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
@endif
