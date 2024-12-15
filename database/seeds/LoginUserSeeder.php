<?php

use App\Admin;
use App\Customer;
use App\SuperAdmin;
use App\DistributorUser;
use App\Employee;
use App\FrontDesk;
use App\Manager;
use App\User;
use App\VendorUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // Admin::truncate()->get();
        // Customer::truncate()->get();
        // Employee::truncate()->get();
        // FrontDesk::truncate()->get();
        // Manager::truncate()->get();

        $pass = 'nopass';
        $adminEmail = 'admin01@gmail.com';
        $user01Email = 'user01@gmail.com';
        $user02Email = 'user02@gmail.com';
        $user03Email = 'A';
        $adm01 = null;
        if (Admin::where(['email' => $adminEmail])->count() < 1) {
            $adm01 =  Admin::create([
                'first_name' => 'Admin',
                'last_name' => '01',
                'phone' => '1234567790',
                'email' => $adminEmail,
                'password' => Hash::make($pass)
            ]);
        }
        if (!$adm01) {
            $adm01 = Admin::first();
        }
        if (User::where(['email' => $user01Email])->count() < 1) {
            $a01 =  User::create([
                'first_name' => 'User',
                'last_name' => '01',
                'phone' => '1234567790',
                'email' => $user01Email,
                'password' => Hash::make($pass),
                'admin_id' => $adm01->id,
                'state'=>'1',
            ]);
        }
        if (User::where(['email' => $user02Email])->count() < 1) {
            $a01 =  User::create([
                'first_name' => 'User',
                'last_name' => '02',
                'phone' => '1234567790',
                'email' => $user02Email,
                'password' => Hash::make($pass),
                'admin_id' => $adm01->id,
                'state'=>'1',
            ]);
        }
        if (User::where(['email' => $user03Email])->count() < 1) {
            $a01 =  User::create([
                'first_name' => 'A',
                'last_name' => 'AB1',
                'phone' => 'user03Email',
                'email' => $user03Email,
                'password' => Hash::make("AB1"),
                'admin_id' => $adm01->id,
                'state'=>'1',
            ]);
        }
    }
}
