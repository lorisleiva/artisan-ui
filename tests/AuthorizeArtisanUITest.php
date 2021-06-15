<?php

use Illuminate\Http\Request;
use Lorisleiva\ArtisanUI\Facades\ArtisanUI;

function setEnvironment(string $environment)
{
    config()->set('app.env', $environment);
    app()['env'] = $environment;
}

it('is authorized by default on local environments', function () {
    // Given we use the default authorization logic.
    ArtisanUI::auth(null);

    // And we're in a local environment.
    setEnvironment('local');

    // Then we can successfully access Artisan UI.
    $this->get(route('artisan-ui.home'))
        ->assertOk()
        ->assertSee('key:generate');
});

it('is denied by default on non-local environments', function () {
    // Given we use the default authorization logic.
    ArtisanUI::auth(null);

    // And we're in a production environment.
    setEnvironment('production');

    // Then we cannot access Artisan UI.
    $this->get(route('artisan-ui.home'))
        ->assertForbidden()
        ->assertDontSee('key:generate');
});

it('can provide its own authorization logic', function () {
    // Given a custom authorization logic that expects a secret from the request.
    ArtisanUI::auth(function (Request $request) {
        return $request->get('secret') === 'ilovelasagnas';
    });

    // Then we can access Artisan UI when we provide that secret.
    $this->get(route('artisan-ui.home') . '?secret=ilovelasagnas')
        ->assertOk()
        ->assertSee('key:generate');

    // But we cannot access it if we don't.
    $this->get(route('artisan-ui.home'))
        ->assertForbidden()
        ->assertDontSee('key:generate');
});
