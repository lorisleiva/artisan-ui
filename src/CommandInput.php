<?php

namespace Lorisleiva\ArtisanUI;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

abstract class CommandInput
{
    protected InputArgument|InputOption $input;

    public function __construct(InputArgument|InputOption $input)
    {
        $this->input = $input;
    }

    #[Pure] abstract public function isRequired(): bool;
    abstract public function getType(): string;

    #[Pure] public function getName(): string
    {
        return $this->input->getName();
    }

    #[Pure] public function getDescription(): ?string
    {
        return $this->input->getDescription();
    }

    #[Pure] public function getDefault(): string|array|null
    {
        return $this->input->getDefault();
    }

    #[Pure] public function getDefaultToDisplay(): string
    {
        return is_string($this->getDefault()) ? $this->getDefault() : '';
    }

    #[Pure] public function isArray(): bool
    {
        return $this->input->isArray();
    }

    public function getAbsoluteKey(): string
    {
        return sprintf('%s.%s', $this->getType(), $this->getName());
    }
}
