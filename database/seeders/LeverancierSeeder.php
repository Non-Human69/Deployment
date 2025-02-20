<?php

namespace Database\Seeders;

use App\Models\Leverancier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeverancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leverancier::create([
            'naam' => 'Test Leverancier',
            'kvk_nummer' => '12345678',
            'vesteging_adres' => 'Teststraat 1',
            'contactper_id' => 1,
        ]);
    }
}
