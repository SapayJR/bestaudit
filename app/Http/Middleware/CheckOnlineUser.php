<?php

namespace App\Http\Middleware;

use Cache;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckOnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $expiredAt = now()->addMinutes(3);
            Cache::put('user-online-' . auth()->id(), true, $expiredAt);
        }
        return $next($request);
    }
}
