<?php

namespace Lorisleiva\ArtisanUI;

use JetBrains\PhpStorm\Pure;

class CommandOption extends CommandInput
{
    #[Pure] public function isRequired(): bool
    {
        return $this->input->isValueRequired();
    }

    public function getType(): string
    {
        return 'options';
    }

    public function isBoolean(): bool
    {
        return ! $this->input->acceptValue();
    }
}
