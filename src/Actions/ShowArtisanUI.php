<?php

namespace Lorisleiva\ArtisanUI\Actions;

class ShowArtisanUI
{
    public function __invoke()
    {
        return view('artisan-ui::home');
    }
}
