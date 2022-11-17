<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationDetailToModuleActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_detail_to_module_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_detail_id');
            $table->unsignedBigInteger('module_action_id');  
            $table->timestamps();

            $table->foreign('notification_detail_id','noti_detail_mod_action_id_too_noti_detail')->references('id')->on('notification_details')->onDelete('cascade');
            $table->foreign('module_action_id','noti_detail_mod_action_id_too_mod_action')->references('id')->on('module_actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_detail_to_module_actions');
    }
}
