<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
           $table->id();
          $table->unsignedBigInteger('user_id');
            // $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('address');
            $table->timestamps();

           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
}

