<?php

namespace Lorisleiva\ArtisanUI\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Lorisleiva\ArtisanUI\Facades\ArtisanUI;

class AuthorizeArtisanUI
{
    public function handle(Request $request, Closure $next): ?Response
    {
        return ArtisanUI::check($request) ? $next($request) : abort(403);
    }
}
