<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        // $routeName = $request->route()->getName();
        // if (! $request->user()->role) {
        //     if ($request->expectsJson()) {
        //         throw  new HttpResponseException(response()->json([
        //             "message"=>"not found"
        //         ])->setStatusCode(404));
        //     }else{
        //         abort(404);
        //     }
        // }

        return $next($request);
    }
}
