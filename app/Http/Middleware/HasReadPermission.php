<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasReadPermission
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
        error_log($request->user()->tokenCan('read'));
        error_log($request->user()->tokenCan('save'));
        error_log($request->user()->tokenCan('delete'));

        if(!$request->user()->tokenCan('read')) {
            return response()->json([
                'message' => 'Missing permission: \'read\'',
            ], 400);
        }

        return $next($request);
    }
}
