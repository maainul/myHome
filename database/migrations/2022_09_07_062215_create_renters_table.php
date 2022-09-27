<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentersTable extends Migration
{
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->id();
            $table->text("renter_image");
            $table->string("name");
            $table->string("e_back");
            $table->string("notes");
            $table->string("email");
            $table->string("fb_id");
            $table->Integer('home_id');
            $table->Integer('room_id');
            $table->string("phone_1");
            $table->string("phone_2");
            $table->integer('office_id');
            $table->integer('salary');
            $table->string("designation");
            $table->string("address");
            $table->integer('gender');
            $table->string("nid");
            $table->date('birthdate');
            $table->date('rent_from');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renters');
    }
}
