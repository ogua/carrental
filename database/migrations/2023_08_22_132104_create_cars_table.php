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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniqueid')->nullable();
            $table->string('avatar')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('myear')->nullable();
            $table->string('color')->nullable();
            $table->string('platenum')->nullable();
            $table->string('capacity')->nullable();
            $table->string('fueltype')->nullable();
            $table->string('transmission')->nullable();
            $table->string('features')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
