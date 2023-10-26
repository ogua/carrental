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
        Schema::create('paystacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tid')->nullable();
            $table->string('tistatus')->nullable();
            $table->string('reference')->nullable();
            $table->string('uniqueid')->nullable();
            $table->string('paytype')->nullable();
            $table->string('urltype')->nullable();
            $table->string('user_id')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('message')->nullable();
            $table->string('reponse')->nullable();
            $table->string('paymentdate')->nullable();
            $table->string('channel')->nullable();
            $table->string('currency')->nullable();
            $table->string('ipaddress')->nullable();
            $table->string('feecharge')->nullable();
            $table->string('authcode')->nullable();
            $table->string('cardtype')->nullable();
            $table->string('bank')->nullable();
            $table->string('countrycode')->nullable();
            $table->string('brand')->nullable();
            $table->string('first4')->nullable();
            $table->string('last4')->nullable();
            $table->string('customerfirstname')->nullable();
            $table->string('customerothernames')->nullable();
            $table->string('customercode')->nullable();
            $table->string('customeremail')->nullable();
            $table->string('customerphone')->nullable();
            $table->string('logstarttime')->nullable();
            $table->string('logspenttime')->nullable();
            $table->string('logattempts')->nullable();
            $table->string('logerrors')->nullable();
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
        Schema::dropIfExists('paystacks');
    }
};
