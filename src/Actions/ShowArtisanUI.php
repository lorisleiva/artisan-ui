<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Illuminate\View\View;
use Lorisleiva\ArtisanUI\ArtisanUI;

class ShowArtisanUI
{
    public function __invoke(ArtisanUI $artisanUI): View
    {
        return view('artisan-ui::home')
            ->with('commands', $artisanUI->all());
    }
}
