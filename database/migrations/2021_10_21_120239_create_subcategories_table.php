<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->string('sub_category_name')->unique();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_active')->default('1');
            $table->boolean('is_blocked')->default('0');
            $table->boolean('is_deleted')->default('0');
            $table->integer('rec_created_by_id')->nullable();
            $table->integer('rec_updated_by_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('subcategories');
    }
}
