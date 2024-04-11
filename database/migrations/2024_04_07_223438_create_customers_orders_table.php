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
        Schema::create('customers_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();

            $table->bigInteger('town_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();

            $table->bigInteger('serepta_id')->unsigned()->nullable();
            $table->string('srpta_price_Lira')->nullable();
            $table->string('srpta_price_Dollar')->nullable();

            $table->bigInteger('tannourine_id')->unsigned()->nullable();
            $table->string('tann_price_Lira')->nullable();
            $table->string('tann_price_Dollar')->nullable();


            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');


            $table->foreign('serepta_id')->references('id')->on('serepta')->onDelete('cascade');
            $table->foreign('tannourine_id')->references('id')->on('tannourine')->onDelete('cascade');
            


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
        Schema::dropIfExists('customers_orders');
    }
};
