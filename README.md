# Artisan UI

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lorisleiva/artisan-ui.svg)](https://packagist.org/packages/lorisleiva/artisan-ui)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/lorisleiva/package-artisan-ui-laravel/Tests?label=tests)](https://github.com/lorisleiva/package-artisan-ui-laravel/actions?query=workflow%3ATests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lorisleiva/artisan-ui.svg)](https://packagist.org/packages/lorisleiva/artisan-ui)

A artisan-ui repository for Laravel Packages.

## Installation

```sh
composer require lorisleiva/artisan-ui
php artisan artisan-ui:install
```

## Usage

Just go to `/artisan` and enjoy! 🌺

## Configure access

By default, Artisan UI is only available on local environments. You can provide your own custom authorization logic by providing a callback to the `ArtisanUI::auth` method. As usual, you may add this logic to any of your service providers.

The following example allows any user on local environments but only admin users on other environments.

```php
use Lorisleiva\ArtisanUI\Facades\ArtisanUI;

ArtisanUI::auth(function ($request) {
    if (app()->environment('local')) {
        return true;
    }

    return $request->check() && $request->user()->isAdmin();
});
```

## Configure routes

You may change the path and domain of the Artisan UI routes to suit your need using the configuration file located in `config/artisan-ui.php`.

Additionally, you may use this configuration file to update the middleware of these routes. By default, the `web` middleware group is used as well as the `AuthorizeArtisanUI` middleware which protects the Artisan UI routes using the callback provided to the `ArtisanUI::auth` method above. Feel free to override that middleware for more custom authorization logic but remember that, without it, the Artisan UI routes will be available to everyone!
