<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'test2',
                'email' => 'test2@test.jp',
                'owner_company_id' =>1, 
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test.jp',
                'owner_company_id' =>1, 
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
            [
                'name' => 'test4',
                'email' => 'test4@test.jp',
                'owner_company_id' =>1, 
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
            [
                'name' => 'test5',
                'email' => 'test5@test.jp',
                'owner_company_id' =>2, 
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
        ]);
    }
}
