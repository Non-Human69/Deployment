<?php

namespace Database\Seeders;

use App\Models\Verkoop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerkoopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Verkoop::create([
            'datum' => '2021-01-01',
            'klant_id' => 1,
        ]);
    }
}
