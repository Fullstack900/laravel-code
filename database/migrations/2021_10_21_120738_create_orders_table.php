<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_id')->unique();
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('status_id');
            $table->boolean('is_cancelled')->default('0');

         
            $table->integer('rec_created_by_id')->nullable();	
            $table->integer('rec_updated_by_id')->nullable();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('status_id')->references('id')->on('status');
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
}
