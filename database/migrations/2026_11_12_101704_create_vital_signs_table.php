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
    Schema::create('vital_signs', function (Blueprint $table) {
        $table->id();

        $table->foreignId('appointment_id')
            ->constrained('appointments')
            ->onDelete('cascade');

        $table->foreignId('nurse_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->decimal('temperature', 4, 1)->nullable();

        $table->unsignedSmallInteger('systolic_bp')->nullable();

        $table->unsignedSmallInteger('diastolic_bp')->nullable();

        $table->unsignedSmallInteger('pulse')->nullable();

        $table->decimal('weight', 5, 2)->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
