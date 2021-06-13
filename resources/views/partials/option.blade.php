@php /** @var Symfony\Component\Console\Input\InputOption $option */ @endphp

@include('artisan-ui::fields.boolean', [
    'name' => $option->getName(),
    'default' => $option->getDefault(),
    'description' => $option->getDescription(),
])
