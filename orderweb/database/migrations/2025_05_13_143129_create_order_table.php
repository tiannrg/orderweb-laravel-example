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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->date('legalization_date')->comment('Fecha de legalización');
            $table->string('address',50)->comment('Dirección');
            $table->string('city',80)->comment('Ciudad');
            $table->foreignId('causal_id')->constrained('causal')
                ->onDelete('cascade');
            $table->foreignId('observation_id')->nullable()->constrained('observation')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
