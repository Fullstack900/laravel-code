<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');

            $table->string('full_name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city');
            $table->longText('description')->nullable();	
            $table->string('country')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('token', 255)->change()->nullable();
            $table->boolean('is_active')->default('0');
            $table->boolean('is_blocked')->default('0');
            $table->boolean('is_deleted')->default('0');
            $table->integer('rec_created_by_id')->nullable();	
            $table->integer('rec_updated_by_id')->nullable();	
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('user_roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
