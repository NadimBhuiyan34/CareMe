<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('mobile')->nullable();
            $table->date('datebirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('married')->nullable();
            $table->string('city')->nullable();
            $table->string('upazila')->nullable();
            $table->string('union')->nullable();
            $table->string('postcode')->nullable();
            $table->string('village')->nullable();
            $table->string('house')->nullable();
            $table->string('profession')->nullable();
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
