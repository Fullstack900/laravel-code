<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_config', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('unique_name')->nullable();
            $table->string('value')->nullable();
            $table->boolean('is_active')->default('1');
            $table->integer('rec_created_by_id');	
            $table->integer('rec_updated_by_id');
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
        Schema::dropIfExists('system_config');
    }
}
