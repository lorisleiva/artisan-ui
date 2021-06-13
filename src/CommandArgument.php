<?php

namespace Lorisleiva\ArtisanUI;

use JetBrains\PhpStorm\Pure;

class CommandArgument extends CommandInput
{
    #[Pure] public function isRequired(): bool
    {
        return $this->input->isRequired();
    }

    public function getType(): string
    {
        return 'arguments';
    }
}
