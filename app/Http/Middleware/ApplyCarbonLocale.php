<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

final class ApplyCarbonLocale
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        Carbon::setLocale(config('app.locale'));

        return $next($request);
    }
}
