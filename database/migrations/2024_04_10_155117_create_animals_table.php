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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable();
            $table->string('mother_name')->nullable();
            $table->string('sex')->notNullable();
            $table->date('date_of_birth')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('type')->notNullable();
            $table->string('breed')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->timestamps();

            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
