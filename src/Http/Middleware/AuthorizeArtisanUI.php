<?php

namespace Lorisleiva\ArtisanUI\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lorisleiva\ArtisanUI\Facades\ArtisanUI;

class AuthorizeArtisanUI
{
    public function handle(Request $request, Closure $next)
    {
        return ArtisanUI::check($request) ? $next($request) : abort(403);
    }
}
