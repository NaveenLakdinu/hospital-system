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
        Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Doctor  Login user account 
        $table->string('specialization'); // e.g. General Physician, Cardiologist, Pediatrician
        $table->string('license_number')->unique(); // SLMC Registration No (e.g. SLMC-34912)
        $table->string('qualification'); // e.g. MBBS (Sri Lanka)
        $table->decimal('consultation_fee', 8, 2); // e.g. 1500.00
        $table->string('room_number')->nullable(); // e.g. Room 02
        $table->text('bio')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
