<?php

namespace App\Http\Controllers;

use App\Models\AllowedUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AllowedUsersController extends Controller
{
    public function store(Request $request)
    {
        $emails = explode(PHP_EOL, $request->input('emails'));

        foreach ($emails as $email) {
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                AllowedUser::create(['email' => $email,'delete_at' => Carbon::today()->addMonths(6),]);
            }
        }
        return redirect()->back()->with('success');
    }
}
