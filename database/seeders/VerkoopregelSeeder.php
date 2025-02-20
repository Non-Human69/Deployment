<?php

namespace Database\Seeders;

use App\Models\Verkoopregel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerkoopregelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Verkoopregel::create([
            'verkoop_id' => 1,
            'product_id' => 1,
            'aantalverkocht' => 10,
        ]);
    }
}
