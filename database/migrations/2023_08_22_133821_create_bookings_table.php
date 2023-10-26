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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniqueid')->nullable();
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('driver_id')
            ->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('location')->nullable();
            $table->string('total')->nullable();
            $table->string('time')->nullable();
            $table->string('paid')->default('no');
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
        Schema::dropIfExists('bookings');
    }
};
