<?php
// app/Http/Middleware/CheckReferrer.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferrer
{
    public function handle(Request $request, Closure $next, ...$allowedReferrers)
    {
        $referrer = $request->headers->get('referer');

        foreach ($allowedReferrers as $allowedReferrer) {
            if ($referrer === route($allowedReferrer)) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
