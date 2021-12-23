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
        DB::table('owners')->insert(
            [
                'name' => 'test2',
                'email' => 'test2@test.jp',
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test.jp',
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],
            [
                'name' => 'test4',
                'email' => 'test4@test.jp',
                'password' => Hash::make('testtest'),
                'created_at' => '2021/12/12 12:12:12'
            ],

        );
    }
}
