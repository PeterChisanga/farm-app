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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id')->notNullable();
            $table->string('first_name')->notNullable();
            $table->string('last_name')->notNullable();
            $table->string('phone_number')->notNullable();
            $table->date('start_date')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
