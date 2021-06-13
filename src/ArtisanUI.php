<?php

namespace Lorisleiva\ArtisanUI;

use Illuminate\Console\Command as ArtisanCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class ArtisanUI
{
    public function all(): Collection
    {
        return collect(Artisan::all())
            ->filter(fn ($command) => $command instanceof ArtisanCommand)
            ->mapInto(Command::class);
    }

    public function allGroupedByNamespace(): Collection
    {
        return $this->all()
            ->groupBy(fn (Command $command) => $command->getNamespace());
    }

    public function find(string $name): ?Command
    {
        return $this->all()->get($name);
    }

    public function findOrFail(string $name): Command
    {
        return tap($this->find($name), function ($command) {
            abort_unless($command, 404, 'Command not found.');
        });
    }
}
