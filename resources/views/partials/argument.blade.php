@php /** @var Symfony\Component\Console\Input\InputArgument $argument */ @endphp

@include('artisan-ui::fields.text', [
    'name' => $argument->getName(),
    'default' => $argument->getDefault(),
    'description' => $argument->getDescription(),
    'required' => $argument->isRequired(),
])
