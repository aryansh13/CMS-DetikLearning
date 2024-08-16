<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $userType): Response
    {
        if ($request->user()->usertype !== $userType) {
            if ($userType === 'admin') {
                return redirect('/');
            } elseif ($userType === 'user') {
                return redirect('adminPage/dashboardAdmin');
            }
        }

        return $next($request);
    }
}
