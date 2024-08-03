<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feed_rations', function (Blueprint $table) {
            $table->id();
            $table->string('animal_type')->notNullable();
            $table->string('nutritional_requirements')->notNullable();
            $table->string('ingredient_blend')->notNullable();
            $table->unsignedBigInteger('number_of_animals')->notNullable();
            $table->unsignedBigInteger('feed_ingredient_id');
            $table->timestamps();

            $table->foreign('feed_ingredient_id')->references('id')->on('feed_ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_rations');
    }
};
