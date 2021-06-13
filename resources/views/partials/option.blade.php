@php /** @var Symfony\Component\Console\Input\InputOption $option */ @endphp

@if($option->acceptValue() && $option->isArray())
    @include('artisan-ui::fields.text', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
        'required' => $option->isValueRequired(),
    ])
@elseif($option->acceptValue())
    @include('artisan-ui::fields.text', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
        'required' => $option->isValueRequired(),
    ])
@else
    @include('artisan-ui::fields.boolean', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
    ])
@endif
