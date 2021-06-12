<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Illuminate\View\View;
use Lorisleiva\ArtisanUI\ArtisanUI;

class ExecuteArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI): View
    {
        return view('artisan-ui::execution')
            ->with('command', $artisanUI->findOrFail($name));
    }
}
