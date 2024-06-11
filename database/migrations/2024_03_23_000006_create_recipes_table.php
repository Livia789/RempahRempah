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
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('ahli_gizi_id');
            $table->foreign('ahli_gizi_id')->references('id')->on('users');
            $table->unsignedBigInteger('company_id')->nullable()->default(null);
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_1_id')->nullable()->default(null);
            $table->foreign('sub_category_1_id')->references('id')->on('categories')->nullable()->default(null);
            $table->unsignedBigInteger('sub_category_2_id')->nullable()->default(null);
            $table->foreign('sub_category_2_id')->references('id')->on('categories')->nullable()->default(null);
            $table->string('name');
            $table->text('description');
            $table->integer('duration');
            $table->text('serving');
            $table->string('img')->default('storage/recipes/default_recipe_img.png');
            $table->string('vid')->nullable()->default(null);
            $table->boolean('is_verified_by_admin')->default(false);
            $table->boolean('is_verified_by_ahli_gizi')->default(false);
            $table->enum('type', ['public', 'private', 'exclusive'])->default('private');
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
