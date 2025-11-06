<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->foreignId('waste_data_id')->constrained('waste_data')->onDelete('cascade');
            $table->decimal('weight', 8, 2); // Weight of this specific waste item
            $table->decimal('price', 15, 2); // Price for this specific waste item (weight * price_per_kg)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};