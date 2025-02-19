<?php

namespace Database\Seeders;

use App\Models\Contactper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contactper::create([
            'naam' => 'Test Contactpersoon',
            'email' => 'test@gmail.com',
            'telefoonnummer' => '0612345678',
            'verificatiecode' => '1234',
        ]);

    }
}
