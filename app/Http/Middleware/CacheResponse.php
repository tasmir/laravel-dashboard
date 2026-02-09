<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;


class CacheResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $ttl = 60): Response
    {
        if(env('APP_ENV') === 'local') {
            return $next($request);
        }
        // Create a unique cache key based on URL
        $key = 'page_cache:' . $request->fullUrl();

        // If cached, return it
        if (Cache::has($key)) {
            return response(Cache::get($key));
        }

        // Otherwise, store response
        $response = $next($request);

        if ($response->isSuccessful()) {
            Cache::put($key, $response->getContent(), $ttl);
        }

        return $response;
    }
}
