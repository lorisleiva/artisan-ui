<?php

namespace Lorisleiva\ArtisanUI;

use Closure;
use Illuminate\Console\Command as ArtisanCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class ArtisanUI
{
    public ?Closure $authUsing = null;

    public function auth(?Closure $callback): self
    {
        $this->authUsing = $callback;

        return $this;
    }

    public function check(Request $request): bool
    {
        return ($this->authUsing ?: function () {
            return app()->environment('local');
        })($request);
    }

    public function all(): Collection
    {
        return collect(Artisan::all())
            ->filter(fn ($command) => $command instanceof ArtisanCommand)
            ->mapInto(Command::class);
    }

    public function allGroupedByNamespace(): Collection
    {
        $namespaces = $this->all()
            ->map(fn (Command $command) => $command->getNamespace())
            ->unique()
            ->values();

        return $this->all()
            ->groupBy(function (Command $command) use ($namespaces) {
                if ($namespaces->contains($command->getName())) {
                    return $command->getName();
                }

                return $command->getNamespace();
            })
            ->sortKeys();
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
