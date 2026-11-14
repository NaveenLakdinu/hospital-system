<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    

{
    public function up(): void
    {
        Schema::create('pharmacy_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('pharmacy_name')->default('MediCare Pharmacy');
            $table->string('contact_number')->default('0771234567');
            $table->text('address');
            $table->string('email')->default('pharmacy@medicare.lk');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmacy_profiles');
    }
};





















    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_profiles');
    }
};


