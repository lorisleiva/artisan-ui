<?php

namespace Lorisleiva\ArtisanUI;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class ArtisanUI
{
    public function all(): Collection
    {
        return collect(Artisan::all())
            ->filter(fn ($command) => $command instanceof Command);
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
