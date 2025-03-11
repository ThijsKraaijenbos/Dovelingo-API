<?php
namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class UpdateStreak
{
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('sso_token', $request->query('token'))->first();

        if ($user) {
            $today = Carbon::today();
            $yesterday = Carbon::yesterday();

            if ($user->last_login === null) {
                $user->streak = 1;
            } elseif (Carbon::parse($user->last_login)->isSameDay($yesterday)) {
                $user->streak += 1;
            } elseif (!Carbon::parse($user->last_login)->isSameDay($today) &&
                !Carbon::parse($user->last_login)->isSameDay($yesterday)) {
                $user->streak = 1;
            }

            $user->last_login = $today;
            $user->save();
        }

        return $next($request);
    }
}
