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
        Schema::create('nutrition_recipe', function (Blueprint $table) {
            $table->unsignedBigInteger('nutrition_id');
            $table->unsignedBigInteger('recipe_id');
            $table->integer('quantity');
            $table->string('unit');
            $table->double('akgPercentage');

            $table->foreign('nutrition_id')->references('id')->on('nutrition')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->primary(['nutrition_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_recipe');
    }
};
