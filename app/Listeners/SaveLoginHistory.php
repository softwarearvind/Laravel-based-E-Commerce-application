<?php

namespace App\Listeners;

use App\Events\LoginSuccess;
use App\Models\LoginHistory;

class SaveLoginHistory
{
    public function handle(LoginSuccess $event): void
    {
        LoginHistory::create([

            'user_id' => $event->user->id,

            'ip_address' => request()->ip(),

            'browser' => request()->userAgent(),

            'platform' => php_uname(),

            'login_at' => now(),
        ]);
    }
}