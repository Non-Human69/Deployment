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
        Schema::create('verkoopregels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verkoop_id')->constrained('verkoops', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
            $table->integer('aantalverkocht');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verkoopregels');
    }
};
