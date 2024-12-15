<?php

use App\KVSetting;
use Illuminate\Database\Seeder;

class KVSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KVSetting::KVSettingSeeder();
    }
}
