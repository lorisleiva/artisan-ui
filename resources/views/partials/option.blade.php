@php /** @var Symfony\Component\Console\Input\InputOption $option */ @endphp

@if($option->acceptValue() && $option->isArray())
    @include('artisan-ui::fields.text', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
        'required' => $option->isValueRequired(),
        'fieldType' => 'options',
    ])
@elseif($option->acceptValue())
    @include('artisan-ui::fields.text', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
        'required' => $option->isValueRequired(),
        'fieldType' => 'options',
    ])
@else
    @include('artisan-ui::fields.boolean', [
        'name' => $option->getName(),
        'default' => $option->getDefault(),
        'description' => $option->getDescription(),
        'fieldType' => 'options',
    ])
@endif
