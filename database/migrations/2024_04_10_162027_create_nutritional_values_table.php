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
        Schema::create('nutritional_values', function (Blueprint $table) {
            $table->id();
            $table->string('protein_content')->notNullable();
            $table->string('fiber_content')->notNullable();
            $table->string('calcium_content')->notNullable();
            $table->string('fat_content')->notNullable();
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
        Schema::dropIfExists('nutritional_values');
    }
};
