<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class EnsureEnabled
{
    public function handle(Request $request, Closure $next): Response
    {
        $campaign = $request->route('campaign');
        if (false == $campaign->getAttribute('enabled')) {
//            dd('disabled');
            return redirect()->to(route('campaign-disabled'));
        }

        return $next($request);
    }
}
