<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class EnsureEnabled
{
    public function handle(Request $request, Closure $next): Response
    {
        $campaign = $request->route(param: 'campaign');

        return $campaign->enabled
            ? $next($request)
            : redirect()->to(route('campaign-disabled'))
            ;
    }
}
