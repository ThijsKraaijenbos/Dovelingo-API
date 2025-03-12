<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    public function updatePoints(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'score' => 'required|integer|min:1'
        ]);

        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->score += $request->score;
        $user->save();

        $earnedBadges = [];
        $badges = Badge::where('required_score', '<=', $user->score)->get();

        foreach ($badges as $badge) {
            if (!UserBadge::where('user_id', $user->id)->where('badge_id', $badge->id)->exists()) {
                UserBadge::create([
                    'user_id' => $user->id,
                    'badge_id' => $badge->id
                ]);
                $earnedBadges[] = $badge->title;
            }
        }
        return response()->json([
            'message' => 'Punten bijgewerkt',
            'total_points' => $user->score,
            'new_badges' => $earnedBadges
        ]);
    }

    public function getUserBadges(Request $request)
    {

        $ssoToken = $request->query('token');

        if (!$ssoToken) {
            return response()->json(['error' => 'SSO token is missing'], 401);
        }


        $user = User::where('sso_token', $ssoToken)->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        $badges = UserBadge::where('user_id', $user->id)
            ->with('badge')
            ->get()
            ->pluck('badge');

        return response()->json([
            'user_id' => $user->id,
            'badges' => $badges
        ]);
    }

    public function getAllBadges(){
        $badges = Badge::all();
        return response()->json($badges);
    }

}
