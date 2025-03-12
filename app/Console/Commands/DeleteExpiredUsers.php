<?php

namespace App\Console\Commands;

use App\Models\AllowedUser;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteExpiredUsers extends Command
{
    protected $signature = 'delete-expired-users';

    public function handle()
    {
        $expiredUsers = AllowedUser::whereDate('delete_at', '<=', Carbon::today())->get();
        Log::info($expiredUsers);

        if($expiredUsers->isNotEmpty()){
            foreach ($expiredUsers as $expiredUser){
                $expiredUser->delete();
            }
        }
    }
}
