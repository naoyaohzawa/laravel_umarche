<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vessel_name');
	        $table->string('owner_name');
            $table->string('vessel_type');
            $table->string('gross_ton');
            $table->string('dwt');
            $table->integer('mmsi');
            $table->string('call_number');
            $table->integer('owner_company_id')->nullable();
            $table->integer('owner_id');
            // $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
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
        Schema::dropIfExists('ships');
    }
}
