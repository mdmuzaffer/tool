<?php

use App\TestUser;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $q = Inspiring::quote();
    $this->comment($q);
    Log::info("Inspiring Quote: \"{$q}\"", [
        'Qupte' => $q,
        'TimeStamp' => now(),
        'Hash' => Hash::make($q)
    ]);
})->describe('Display an inspiring quote');

Artisan::command('csget:testuser', function () {
    // $this->comment(Inspiring::quote());
    $arr = ['id' => "ID", 'name' => "Name", 'email' => "Email"];
    $users = TestUser::all(array_keys($arr));
    $this->table(array_values($arr), $users);
    // Log::info()
})->describe('Display all TestUsers');
