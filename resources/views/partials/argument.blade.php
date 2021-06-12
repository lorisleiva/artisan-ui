@php /** @var Symfony\Component\Console\Input\InputArgument $argument */ @endphp

<div>
    <label for="email" class="block text-sm font-medium text-gray-700">{{ $argument->getName() }}</label>
    <div class="mt-1">
        <input
            type="text"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $argument->getDefault() }}"
        >
    </div>
    <p class="mt-2 text-sm text-gray-500">{{ $argument->getDescription() }}</p>
</div>
