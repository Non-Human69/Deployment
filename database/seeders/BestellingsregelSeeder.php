<?php

namespace Database\Seeders;

use App\Models\Bestellingsregel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BestellingsregelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bestellingsregel::create([
            'bestelling_id' => 1,
            'product_id' => 1,
            'aantalbesteld' => 10,
            'aantalonvangen' => 10,
        ]);
    }
}
