<?php

namespace App\Http\Middleware\Custom;

use Closure;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && in_array(env('APP_ENV'), ['stage', 'staging', 'preprod', 'preproduction', 'prod', 'production'])) {
            // disabled for now because reverse proxy does not forward https :-(
            // return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
