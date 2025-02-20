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
        Product::create([
            'naam' => 'Test Product 2',
            'categorie' => 'Test Categorie 2',
            'prijs' => 20.00,
            'vervaldatum' => '2022-02-02', // '2022-02-02' is a date in the format 'YYYY-MM-DD'
            'voorraadaantal' => 20,
            'minimale_voorraad' => 10,
            'barcode' => '1234567890124',
            'leverancier_id' => 1,
        ]);
        Product::create([
            'naam' => 'Test Product 3',
            'categorie' => 'Test Categorie 3',
            'prijs' => 30.00,
            'vervaldatum' => '2022-03-03', // '2022-03-03' is a date in the format 'YYYY-MM-DD'
            'voorraadaantal' => 30,
            'minimale_voorraad' => 15,
            'barcode' => '1234567890125',
            'leverancier_id' => 1,
        ]);
        Product::create([
            'naam' => 'Test Product 4',
            'categorie' => 'Test Categorie 4',
            'prijs' => 40.00,
            'vervaldatum' => '2022-04-04', // '2022-04-04' is a date in the format 'YYYY-MM-DD'
            'voorraadaantal' => 40,
            'minimale_voorraad' => 20,
            'barcode' => '1234567890126',
            'leverancier_id' => 1,
        ]);
    }
}
