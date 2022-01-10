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
                'vessel_name' => '山和丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '白油船',
                'gross_ton' => '818',
                'dwt' => '1800',
                'mmsi' => '431602345',
                'call_number' => 'JD2298',
                'owner_company_id' => '1',
                'owner_id' => '1',
            ],
            [
                'vessel_name' => '鶴盛丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '白油船',
                'gross_ton' => '3736',
                'dwt' => '5650',
                'mmsi' => '431004235',
                'call_number' => ' JD3481',
                'owner_company_id' => '1',
                'owner_id' => '1',
            ],
            [
                'vessel_name' => '呉丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '塩専用船',
                'gross_ton' => '7050',
                'dwt' => '11230',
                'mmsi' => '431004777',
                'call_number' => 'JD4009',
                'owner_company_id' => '1',
                'owner_id' => '2',
            ],
            [
                'vessel_name' => '山和丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '白油船',
                'gross_ton' => '818',
                'dwt' => '1800',
                'mmsi' => '431602345',
                'call_number' => 'JD2298',
                'owner_company_id' => '2',
                'owner_id' => '3',
            ],
            [
                'vessel_name' => '鶴盛丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '白油船',
                'gross_ton' => '3736',
                'dwt' => '5650',
                'mmsi' => '431004235',
                'call_number' => ' JD3481',
                'owner_company_id' => '2',
                'owner_id' => '3',
            ],
            [
                'vessel_name' => '呉丸',
                'owner_name' => '大澤海運',
                'vessel_type' => '塩専用船',
                'gross_ton' => '7050',
                'dwt' => '11230',
                'mmsi' => '431004777',
                'call_number' => 'JD4009',
                'owner_company_id' => '2',
                'owner_id' => '4',
            ],
        ]);
    }
}
