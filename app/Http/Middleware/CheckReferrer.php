<?php
// app/Http/Middleware/CheckReferrer.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferrer
{
    protected $allowedDomains = [
        'localhost',
        '127.0.0.1',
        'pabe.i-link.support',
        // Add other allowed domains here
    ];

    public function handle(Request $request, Closure $next, ...$allowedReferrers)
    {
        $referrer = $request->headers->get('referer');

        if ($referrer) {
            $referrerHost = parse_url($referrer, PHP_URL_HOST);
            if (!in_array($referrerHost, $this->allowedDomains)) {
                return response()->json(['error' => 'Unauthorized - Invalid domain'], 403);
            }

            foreach ($allowedReferrers as $allowedReferrer) {
                if ($referrer === route($allowedReferrer)) {
                    return $next($request);
                }
            }
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}

