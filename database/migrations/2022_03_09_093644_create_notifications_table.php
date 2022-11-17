<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger("user_id");
            $table->string("title")->nullable();
            $table->text("body")->nullable();
            $table->enum("broadcast_type",['sms','socket','both']);
            $table->string("module_name")->nullable();
            $table->bigInteger("module_model_id")->nullable();
            $table->boolean("is_read")->default(0);
            
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
        Schema::dropIfExists('notifications');
    }
}
