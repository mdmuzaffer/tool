<?php

use Illuminate\Database\Seeder;
// use App;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LoginUserSeeder::class);
        $this->call(KVSettingSeeder::class);
    }
}
