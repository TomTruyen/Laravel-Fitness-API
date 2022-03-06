<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasDeletePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->user()->tokenCan('delete')) {
            return response()->json([
                'message' => 'Missing permission: \'delete\'',
            ], 400);
        }

        return $next($request);
    }
}
