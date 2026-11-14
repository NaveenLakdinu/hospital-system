<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('medicines')) {
            Schema::table('medicines', function (Blueprint $table) {
                if (!Schema::hasColumn('medicines', 'name')) {
                    $table->string('name')->nullable();
                }
                if (!Schema::hasColumn('medicines', 'dosage_form')) {
                    $table->string('dosage_form')->default('Tablets');
                }
                if (!Schema::hasColumn('medicines', 'stock_qty')) {
                    $table->integer('stock_qty')->default(0);
                }
                if (!Schema::hasColumn('medicines', 'price')) {
                    $table->decimal('price', 10, 2)->default(0.00);
                }
            });
        } else {
            Schema::create('medicines', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('dosage_form')->default('Tablets');
                $table->integer('stock_qty')->default(0);
                $table->decimal('price', 10, 2)->default(0.00);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Foreign key constraint ආරක්ෂා කිරීම සඳහා table එක drop නොකරයි
    }
};