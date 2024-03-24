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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('recipe_name');
            $table->string('recipe_description');
            $table->integer('recipe_time');
            $table->string('recipe_image');
            $table->string('recipe_video')->nullable()->default(null);
            $table->boolean('is_verified_by_admin')->default(false);
            $table->boolean('is_verified_by_ahli_gizi')->default(false);
            $table->enum('recipe_type', ['public', 'private'])->default('private');
            $table->unsignedBigInteger('admin_id')->nullable()->default(null);
            $table->foreign('admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('ahli_gizi_id')->nullable()->default(null);
            $table->foreign('ahli_gizi_id')->references('id')->on('users');
            $table->unsignedBigInteger('special_occasion_id')->nullable()->default(null);
            $table->foreign('special_occasion_id')->references('id')->on('special_occasions')->nullable()->default(null);
            $table->unsignedBigInteger('daerah_id')->nullable()->default(null);
            $table->foreign('daerah_id')->references('id')->on('daerahs')->nullable()->default(null);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
