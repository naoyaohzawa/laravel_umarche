<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ships')->insert([
            [
                'vessel_name' => '大澤丸',
                'owner_name' => '大澤海運',
                'vessel_type' => 'バラ積み船',
                'gross_ton' => '799',
                'dwt' => '2500',
                'mmsi' => '431101143',
                'call_number' => 'JD2253',
                'owner_company_id' => '2',
                'owner_id' => '1',
            ],
            [
                'vessel_name' => '聖嶺',
                'owner_name' => '大澤海運',
                'vessel_type' => 'バラ積み船',
                'gross_ton' => '749',
                'dwt' => '2350',
                'mmsi' => '431007895',
                'call_number' => 'JD4009',
                'owner_company_id' => '2',
                'owner_id' => '1',
            ],
            [
                'vessel_name' => '聖嶺No.2',
                'owner_name' => '大澤海運',
                'vessel_type' => 'バラ積み船',
                'gross_ton' => '749',
                'dwt' => '2350',
                'mmsi' => '431007895',
                'call_number' => 'JD4009',
                'owner_company_id' => '3',
                'owner_id' => '2',
            ],
            [
                'vessel_name' => '聖嶺No.3',
                'owner_name' => '大澤海運',
                'vessel_type' => 'バラ積み船',
                'gross_ton' => '749',
                'dwt' => '2350',
                'mmsi' => '431007895',
                'call_number' => 'JD4009',
                'owner_company_id' => '2',
                'owner_id' => '2',
            ],
        ]);
    }
}
