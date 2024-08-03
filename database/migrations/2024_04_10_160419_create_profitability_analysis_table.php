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
        Schema::create('profitability_analysis', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_income', 10, 2)->notNullable();
            $table->decimal('total_expenses', 10, 2)->notNullable();
            $table->decimal('net_profit', 10, 2)->notNullable();
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
        Schema::dropIfExists('profitability_analysis');
    }
};
