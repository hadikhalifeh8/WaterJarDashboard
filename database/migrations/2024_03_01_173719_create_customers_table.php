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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('phone')->unique();

            $table->bigInteger('town_id')->unsigned();
            $table->string('town_name_ar')->nullable();
            $table->string('town_name_en')->nullable();


            $table->bigInteger('district_id')->unsigned();
            $table->string('district_name_ar')->nullable();
            $table->string('district_name_en')->nullable();

            $table->bigInteger('driver_id')->unsigned();
            $table->string('driver_name_ar')->nullable();
            $table->string('driver_name_en')->nullable();


            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

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
        Schema::dropIfExists('customers');
    }
};
