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
        Schema::create('bestellingsregels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bestelling_id')->constrained('bestellings', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
            $table->integer('aantalbesteld');
            $table->integer('aantalonvangen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestellingsregels');
    }
};
