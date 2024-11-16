<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class SanctionAct
{
    public function handle(Request $request, Closure $next)
    {
        $campaign = $request->route(param: 'campaign');

        if (true !== $request->session()->get(key: 'sanction-agree')) {
            app('redirect')->setIntendedUrl($request->path());

            return redirect(route('sanction-campaign.show', array_merge($request->all(), [
                'campaign' => $campaign->id,
            ])));
        }

        return $next($request);
    }

    public function store(Request $request)
    {

    }
}
