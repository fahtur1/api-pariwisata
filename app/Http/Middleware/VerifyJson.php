<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyJson
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post')) {
            if (empty($request->json()->all())) {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
        }

        return $next($request);
    }
}
