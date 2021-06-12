<?php

use Illuminate\Support\Facades\Route;
use Lorisleiva\ArtisanUI\Actions\ShowArtisanUI;

Route::get('/artisan', ShowArtisanUI::class);
