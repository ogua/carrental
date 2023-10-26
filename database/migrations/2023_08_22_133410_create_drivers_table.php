<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniqueid')->nullable();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('idtype')->nullable();
            $table->string('idnumber')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('license')->nullable();
            $table->string('experience')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('drivers');
    }
};
