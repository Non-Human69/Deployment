<?php

namespace Database\Seeders;

use App\Models\Bestelling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BestellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bestelling::create([
            'datum' => '2025-02-19',
            'leverancier_id' => 1,
        ]);
    }
}
