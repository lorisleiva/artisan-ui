<?php

use Illuminate\Support\Facades\Route;
use Lorisleiva\ArtisanUI\Actions\ExecuteArtisanCommand;
use Lorisleiva\ArtisanUI\Actions\ShowArtisanCommand;
use Lorisleiva\ArtisanUI\Actions\ShowArtisanUI;

Route::get('/artisan', ShowArtisanUI::class)->name('artisan-ui.home');
Route::get('/artisan/{name}', ShowArtisanCommand::class)->name('artisan-ui.detail');
Route::post('/artisan/{name}/execution', ExecuteArtisanCommand::class)->name('artisan-ui.execution');
