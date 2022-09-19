<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("room_number");
            $table->integer('floor_id');
            $table->tinyInteger('status')->default('0');
            $table->integer('gas_bill')->default('0');
            $table->integer('internet_bill')->default('0');
            $table->integer('dish_bill')->default('0');
            $table->integer('water_bill')->default('0');
            $table->integer('dust_bill')->default('0');
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
        Schema::dropIfExists('rooms');
    }
}
