<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('medicine_id');
            $table->string('medicine_name',35);
            $table->float('price',8);
            $table->string('genre',30);
            $table->string('details',100);
            $table->string('availability',5);
            
           // $table->timestamp('email_verified_at')->nullable();
            //$table->binary('password',60);
            //$table->rememberToken();
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
