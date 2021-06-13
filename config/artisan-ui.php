<?php

use Lorisleiva\ArtisanUI\Http\Middleware\AuthorizeArtisanUI;

return [
    /*
    |--------------------------------------------------------------------------
    | Artisan UI Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Artisan UI will be accessible from. If this
    | setting is null, Artisan UI will reside under the same domain as the
    | application. Otherwise, this value will serve as the subdomain.
    |
    */

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Artisan UI Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where the Artisan UI pages will be accessible from.
    | All Artisan UI routes will be prefixed by this path. E.g. "/artisan",
    | "/artisan/migrate". Feel free to change this to anything you like.
    |
    */

    'path' => 'artisan',

    /*
    |--------------------------------------------------------------------------
    | Artisan UI Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached to each Artisan UI route, allowing
    | you to add your own middleware to this list or change any of the
    | existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => ['web', AuthorizeArtisanUI::class],
];
