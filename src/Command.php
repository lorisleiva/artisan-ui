<?php

namespace Lorisleiva\ArtisanUI;

use Illuminate\Console\Command as ArtisanCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\Pure;

class Command
{
    protected ArtisanCommand $artisanCommand;

    public function __construct(ArtisanCommand $artisanCommand)
    {
        $this->artisanCommand = $artisanCommand;
    }

    #[Pure] public function getName(): string
    {
        return $this->artisanCommand->getName();
    }

    #[Pure] public function getNamespace(): ?string
    {
        if (! Str::contains($this->getName(), ':')) {
            return null;
        }

        return Str::before($this->getName(), ':');
    }

    #[Pure] public function getDescription(): string
    {
        return $this->artisanCommand->getDescription();
    }

    public function getArguments(): Collection
    {
        return collect($this->artisanCommand->getDefinition()->getArguments())
            ->mapInto(CommandArgument::class);
    }

    public function getArgumentsAsJson(): string
    {
        return $this->getArguments()
            ->mapWithKeys(fn ($value) => [$value->getName() => null])
            ->toJson();
    }

    public function getArgumentCount(): int
    {
        return count($this->artisanCommand->getDefinition()->getArguments());
    }

    public function hasArguments(): bool
    {
        return ! empty($this->artisanCommand->getDefinition()->getArguments());
    }

    public function getOptions(): Collection
    {
        return collect($this->artisanCommand->getDefinition()->getOptions())
            ->mapInto(CommandOption::class);
    }

    public function getOptionsAsJson(): string
    {
        return $this->getOptions()
            ->mapWithKeys(fn ($value) => [$value->getName() => null])
            ->toJson();
    }

    public function getOptionCount(): int
    {
        return count($this->artisanCommand->getDefinition()->getOptions());
    }

    public function hasOptions(): bool
    {
        return ! empty($this->artisanCommand->getDefinition()->getOptions());
    }

    public function getArtisanCommand(): ArtisanCommand
    {
        return $this->artisanCommand;
    }

    public function shouldOpenArgumentsAccordionOnLoad(): bool
    {
        return $this->getArguments()->contains(fn (CommandArgument $argument) => $argument->isRequired());
    }
}
