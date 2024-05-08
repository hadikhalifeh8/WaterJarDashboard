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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
    
            $table->bigInteger('driver_id')->unsigned();
            $table->string('driver_name')->nullable();
            $table->string('totalJars')->nullable();
    
            $table->integer('customer_id');
            $table->string('customer_name')->nullable();
            $table->integer('town_id');
            $table->string('town_name')->nullable();
            $table->integer('district_id');
            $table->string('district_name')->nullable();
            $table->integer('serepta_id');
            $table->string('serepta_name')->nullable();
            $table->string('srpta_price_Lira')->nullable();
            $table->integer('qty_jar_in')->nullable();
            $table->integer('qty_jar_out')->nullable();
            $table->integer('qty_previous_jars')->nullable();
            $table->integer('total_jar')->nullable();
            $table->float('price_per_jar')->nullable();
            $table->float('total_price_jars')->nullable();
            $table->float('old_debt')->nullable();
            $table->float('new_debt')->nullable();
            $table->float('paid')->nullable();
            $table->float('total_price')->nullable();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
    
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
        Schema::dropIfExists('orders');
    }
};
