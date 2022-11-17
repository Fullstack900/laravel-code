<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationDetailToUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_detail_to_user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_detail_id');
            $table->unsignedBigInteger('role_id');            
            $table->enum('user_selection',['all','relevant'])->default('all');
            $table->timestamps();

            $table->foreign('notification_detail_id')->references('id')->on('notification_details')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_detail_to_user_roles');
    }
}
