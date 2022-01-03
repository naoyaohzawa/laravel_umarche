<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoyageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voyages')->insert([
            [
                'ship_id' => '2',
                'owner_id' => '1',
                'itinerary_number' => '5',
                'operator_name' => '岐阜海運',
                'operator_id' => '2',
                'cargo_company_name' => '名古屋製紙',
                'cargo_company_id' => '3',
                'owner_company_name' => '大澤海運',
                'owner_company_id' => '1',
                'cargo_description' => '紙パルプ',
                'cargo_amount' => '1000',
                'planned_loading_port' => '名古屋港',
                'planned_discharging_port' => '四日市港',
                'planned_loading_date' => '2021/12/01',
                'planned_discharging_date' => '2021/12/03',
                'arrived_port_date' => '2021/12/01 08:10:00',
                'loading_started_date' => '2021/12/01 09:10:00',
                'loading_completed_date' => '2021/12/01 17:10:00',
                'loading_port_disported_date' => '2021/12/01 19:10:00',
                'discharging_port_arrived_date' => '2021/12/03 09:10:00',
                'discharging_start_date' => '2021/12/03 11:10:00',
                'discharging_complete_date' => '2021/12/03 17:10:00',
                'discharging_port_disported_date' => '2021/12/03 19:10:00',
                'complete_flag' => '1',
            ],
            [
                'ship_id' => '2',
                'owner_id' => '1',
                'itinerary_number' => '6',
                'operator_name' => '岐阜海運',
                'operator_id' => '2',
                'cargo_company_name' => '三重鉄鋼',
                'cargo_company_id' => '4',
                'owner_company_name' => '大澤海運',
                'owner_company_id' => '1',
                'cargo_description' => '鉄鋼',
                'cargo_amount' => '1900',
                'planned_loading_port' => '四日市港',
                'planned_discharging_port' => '横浜港',
                'planned_loading_date' => '2021/12/04',
                'planned_discharging_date' => '2021/12/07',
                'arrived_port_date' => '2021/12/04 08:10:00',
                'loading_started_date' => '2021/12/04 09:10:00',
                'loading_completed_date' => '2021/12/04 17:10:00',
                'loading_port_disported_date' => '2021/12/04 19:10:00',
                'discharging_port_arrived_date' => '2021/12/07 09:10:00',
                'discharging_start_date' => '2021/12/07 11:10:00',
                'discharging_complete_date' => '2021/12/07 17:10:00',
                'discharging_port_disported_date' => '2021/12/07 19:10:00',
                'complete_flag' => '1',
            ],
            [
                'ship_id' => '2',
                'owner_id' => '1',
                'itinerary_number' => '7',
                'operator_name' => '岐阜海運',
                'operator_id' => '2',
                'cargo_company_name' => '名古屋製紙',
                'cargo_company_id' => '3',
                'owner_company_name' => '大澤海運',
                'owner_company_id' => '1',
                'cargo_description' => '鉄鋼',
                'cargo_amount' => '1900',
                'planned_loading_port' => '東京港',
                'planned_discharging_port' => '四日市港',
                'planned_loading_date' => '2021/12/09',
                'planned_discharging_date' => '2021/12/12',
                'arrived_port_date' => '2021/12/09 08:10:00',
                'loading_started_date' => '2021/12/09 09:10:00',
                'loading_completed_date' => '2021/12/09 17:10:00',
                'loading_port_disported_date' => '2021/12/09 19:10:00',
                'discharging_port_arrived_date' => '2021/12/12 09:10:00',
                'discharging_start_date' => '2021/12/12 11:10:00',
                'discharging_complete_date' => '2021/12/12 17:10:00',
                'discharging_port_disported_date' => '2021/12/12 19:10:00',
                'complete_flag' => '1',
            ],
            [
                'ship_id' => '5',
                'owner_id' => '2',
                'itinerary_number' => '7',
                'operator_name' => '愛知海運',
                'operator_id' => '2',
                'cargo_company_name' => '名古屋製紙',
                'cargo_company_id' => '3',
                'owner_company_name' => '大澤海運',
                'owner_company_id' => '1',
                'cargo_description' => '鉄鋼',
                'cargo_amount' => '1900',
                'planned_loading_port' => '東京港',
                'planned_discharging_port' => '四日市港',
                'planned_loading_date' => '2021/12/09',
                'planned_discharging_date' => '2021/12/12',
                'arrived_port_date' => '2021/12/09 08:10:00',
                'loading_started_date' => '2021/12/09 09:10:00',
                'loading_completed_date' => '2021/12/09 17:10:00',
                'loading_port_disported_date' => '2021/12/09 19:10:00',
                'discharging_port_arrived_date' => '2021/12/12 09:10:00',
                'discharging_start_date' => '2021/12/12 11:10:00',
                'discharging_complete_date' => '2021/12/12 17:10:00',
                'discharging_port_disported_date' => '2021/12/12 19:10:00',
                'complete_flag' => '1',
            ],
            
        ]);
    }
}
