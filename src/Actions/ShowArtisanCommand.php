<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Illuminate\View\View;
use Lorisleiva\ArtisanUI\ArtisanUI;

class ShowArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI): View
    {
        return view('artisan-ui::detail')
            ->with('command', $artisanUI->findOrFail($name));
    }
}
