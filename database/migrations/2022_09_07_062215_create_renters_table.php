<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->id();
            // $table->integer('office_id')->unsigned();
            $table->string("name");
            $table->string("email");
            $table->string("fb_id");
            $table->string("phone_1");
            $table->string("phone_2");
            $table->integer('office_id');
            $table->integer('salary');
            $table->string("designation");
            $table->string("address");
            $table->integer('gender');
            $table->string("nid");
            $table->date('birthdate');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
            // $table->foreignId('office_id')->constrained('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renters');
    }
}
