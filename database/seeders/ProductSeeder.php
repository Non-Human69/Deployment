<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'naam' => 'Test Product',
            'categorie' => 'Test Categorie',
            'prijs' => 10.00,
            'vervaldatum' => '2022-01-01', // '2022-01-01' is a date in the format 'YYYY-MM-DD'
            'voorraadaantal' => 10,
            'minimale_voorraad' => 5,
            'barcode' => '1234567890123',
            'leverancier_id' => 1,
        ]);
    }
}
