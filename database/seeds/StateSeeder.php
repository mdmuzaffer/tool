<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('states')->insert([
            [
                'id'  => 1,
                'code' => 'UP',
                'subdomain_prefix' => 'up',
                'receipt_prefix' => 'UPT',
                'name' => 'Uttar Pradesh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 2,
                'code' => 'UK',
                'subdomain_prefix' => 'uk',
                'receipt_prefix' => 'UKT',
                'name' => 'Uttarakhand',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 3,
                'code' => 'PB',
                'subdomain_prefix' => 'pb',
                'receipt_prefix' => 'PBT',
                'name' => 'Punjab',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 4,
                'code' => 'HR',
                'subdomain_prefix' => 'hr',
                'receipt_prefix' => 'HRT',
                'name' => 'Haryana',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 5,
                'code' => 'BR',
                'subdomain_prefix' => 'br',
                'receipt_prefix' => 'BRT',
                'name' => 'Bihar',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 6,
                'code' => 'GJ',
                'subdomain_prefix' => 'gj',
                'receipt_prefix' => 'GJT',
                'name' => 'Gujarat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 7,
                'code' => 'MH',
                'subdomain_prefix' => 'mh',
                'receipt_prefix' => 'MHT',
                'name' => 'Maharashtra',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 8,
                'code' => 'JH',
                'subdomain_prefix' => 'jh',
                'receipt_prefix' => 'JHT',
                'name' => 'JHARKHAND',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 9,
                'code' => 'HP',
                'subdomain_prefix' => 'hp',
                'receipt_prefix' => 'HPT',
                'name' => 'Himachal Pradesh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 10,
                'code' => 'KA',
                'subdomain_prefix' => 'ka',
                'receipt_prefix' => 'KAT',
                'name' => 'Karnatka',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 11,
                'code' => 'RAJ',
                'subdomain_prefix' => 'raj',
                'receipt_prefix' => 'RJT',
                'name' => 'Rajasthan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 12,
                'code' => 'MP',
                'subdomain_prefix' => 'mp',
                'receipt_prefix' => 'MPT',
                'name' => 'Madhya Pradesh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 13,
                'code' => 'TM',
                'subdomain_prefix' => 'tm',
                'receipt_prefix' => 'TMT',
                'name' => 'Tamil Nadu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'  => 14,
                'code' => 'AP',
                'subdomain_prefix' => 'ap',
                'receipt_prefix' => 'APT',
                'name' => 'Andhra Pradesh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
