<?php

use Illuminate\Support\Facades\Route;
use Lorisleiva\ArtisanUI\Actions\ExecuteArtisanCommand;
use Lorisleiva\ArtisanUI\Actions\ShowArtisanCommand;
use Lorisleiva\ArtisanUI\Actions\ShowArtisanUI;


Route::group([
    'domain' => config('artisan-ui.domain'),
    'prefix' => config('artisan-ui.path'),
    'middleware' => config('artisan-ui.middleware', 'web'),
    'as' => 'artisan-ui.',
], function () {
    Route::get('/', ShowArtisanUI::class)->name('home');
    Route::get('/{name}', ShowArtisanCommand::class)->name('detail');
    Route::post('/{name}/execution', ExecuteArtisanCommand::class)->name('execution');
});
