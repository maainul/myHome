<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->Integer('rent_amount');
            $table->Integer('renter_id');
            $table->string('created_by');
            $table->Integer('elct_bill');
            $table->Integer('gas_bill');
            $table->Integer('internet_bill');
            $table->Integer('dish_bill');
            $table->Integer('water_bill');
            $table->Integer('dust_bill');
            $table->date('rent_month');
            $table->date('rent_given_date');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('rents');
    }
}
