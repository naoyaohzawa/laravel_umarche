<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnersCompany extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners_companies')->insert([

            [
                'company_name' => '大澤海運',
                'company_address' => '東京都千代田区1-1',
                'company_code' => 1
            ],
            [
                'company_name' => '加藤海運',
                'company_address' => '東京都中央区1-1',
                'company_code' => 2
            ],
            [
                'company_name' => '田中海運',
                'company_address' => '東京都港区1-1',
                'company_code' => 3
            ],
        ]
        );
    }
}
