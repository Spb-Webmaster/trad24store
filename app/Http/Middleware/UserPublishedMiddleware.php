<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPublishedMiddleware
{
    public function handle(Request $request, Closure $next): Response|string
    {


        $user = auth()->user();
        if ($user) {

            return $next($request);
        }


        return redirect('/login');
    }
}
