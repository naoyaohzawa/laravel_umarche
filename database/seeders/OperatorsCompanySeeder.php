<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorsCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operators_companies')->insert([

            [
                'company_name' => 'Ohzawa marine Operator',
                'company_address' => '東京都千代田区1-1',
                'company_code' => 1
            ],
            [
                'company_name' => 'Kato Operator',
                'company_address' => '東京都中央区1-1',
                'company_code' => 2
            ],
            [
                'company_name' => 'Tanaka Operator',
                'company_address' => '東京都港区1-1',
                'company_code' => 3
            ],
        ]
        );
    }
}
