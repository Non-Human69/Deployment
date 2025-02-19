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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('categorie');
            $table->decimal('prijs', 8, 2);
            $table->date('vervaldatum');
            $table->integer('voorraadaantal');
            $table->integer('minimale_voorraad');
            $table->string('barcode');
            $table->foreignId('leverancier_id')->constrained('leveranciers', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
