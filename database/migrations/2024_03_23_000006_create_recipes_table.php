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
            $table->unsignedBigInteger('admin_id')->nullable()->default(null);
            $table->foreign('admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('ahli_gizi_id')->nullable()->default(null);
            $table->foreign('ahli_gizi_id')->references('id')->on('users');
            $table->unsignedBigInteger('company_id')->nullable()->default(null);
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_1_id')->nullable()->default(null);
            $table->foreign('sub_category_1_id')->references('id')->on('categories')->nullable()->default(null);
            $table->unsignedBigInteger('sub_category_2_id')->nullable()->default(null);
            $table->foreign('sub_category_2_id')->references('id')->on('categories')->nullable()->default(null);
            $table->string('name');
            $table->string('description', 1000);
            $table->integer('duration');
            $table->string('serving');
            $table->string('img')->default('storage/recipeAssets/default_recipe_img.png');
            $table->string('vid')->nullable()->default(null);
            $table->boolean('is_verified_by_admin')->default(false);
            $table->boolean('is_verified_by_ahli_gizi')->default(false);
            $table->enum('type', ['public', 'private', 'exclusive'])->default('private');
            $table->integer('energiTotal')->nullable()->default(null);
            $table->integer('energiDariLemak')->nullable()->default(null);
            $table->string('rejectionReason')->nullable()->default(null);
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
