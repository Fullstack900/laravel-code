<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('area_id');
           
            $table->string('location');
            $table->string('country');
            $table->string('phone');
            $table->longText('comments');	
            $table->dateTime('booking_date');
            $table->dateTime('booking_time');
            $table->integer('appliance_quantity')->nullable();
            $table->integer('rec_created_by_id')->nullable();	
            $table->integer('rec_updated_by_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('subcategories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('area_id')->references('id')->on('area');

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
}
