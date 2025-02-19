<?php

namespace Database\Seeders;

use App\Models\Klant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Klant::create([
            'naam' => 'Test Klant',
            'email' => 'klant@gmail.com',
            'telefoonnummer' => '0612345678',
        ]);
    }
}
