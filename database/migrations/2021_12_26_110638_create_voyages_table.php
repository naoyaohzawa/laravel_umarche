<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_id');   
            $table->integer('owner_id');
            $table->string('itinerary_number')->nullable();
            $table->string('operator_name')->nullable();
            $table->integer('operator_id')->nullable();
            $table->string('cargo_company_name')->nullable();
            $table->integer('cargo_company_id')->nullable();
            $table->string('owner_company_name')->nullable();
            $table->integer('owner_company_id')->nullable();
            $table->string('cargo_description')->nullable();
            $table->integer('cargo_amount')->nullable();
            $table->string('planned_loading_port')->nullable();
            $table->string('planned_discharging_port')->nullable();
            $table->date('planned_loading_date')->nullable();
            $table->date('planned_discharging_date')->nullable();
            $table->dateTime('arrived_port_date')->nullable();
            $table->dateTime('loading_started_date')->nullable();
            $table->dateTime('loading_completed_date')->nullable();
            $table->dateTime('loading_port_disported_date')->nullable();
            $table->dateTime('discharging_port_arrived_date')->nullable();
            $table->dateTime('discharging_start_date')->nullable();
            $table->string('discharging_complete_date')->nullable();
            $table->string('discharging_port_disported_date')->nullable();
            $table->integer('complete_flag')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voyages');
    }
}
