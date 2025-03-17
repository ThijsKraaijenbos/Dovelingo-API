<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AllowedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AllowedUsersController extends Controller
{
    public function store(Request $request)
    {
        $emails = preg_split('/[\r\n]+/', trim($request->input('emails')));

        foreach ($emails as $email) {
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                AllowedUser::create(['email' => $email,'delete_at' => Carbon::today()->addMonths(6),]);
            }
        }
        return response()->json([
            'message' => 'Emails opgeslagen',
        ], 201);
    }
}
