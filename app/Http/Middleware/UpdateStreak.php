<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateStreak
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            $today = Carbon::today();
            $yesterday = Carbon::yesterday();


            if ($user->last_login === null) {
                $user->streak = 1;
            } elseif (Carbon::parse($user->last_login)->isSameDay($yesterday)) {
                $user->streak += 1;
            } elseif (!Carbon::parse($user->last_login)->isSameDay($today)) {
                $user->streak = 1;
            }

            $user->last_login = $today;
            $user->save();
        }
        return $next($request);
    }
}
