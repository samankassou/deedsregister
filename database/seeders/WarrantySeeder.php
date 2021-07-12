<?php

namespace Database\Seeders;

use App\Models\Warranty;
use Illuminate\Database\Seeder;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warranty::insert([
            ['name' => 'Domiciliation de loyers'],
            ['name' => 'Domiciliation/AVI'],
            ['name' => 'Lettre d\'intention(A, B, C, D)'],
            ['name' => 'Délégation de revenu'],
            ['name' => 'Délégation de d\'indemnité d\'Assurances'],
            ['name' => 'Acte de nantissement de compte']
        ]);
    }
}
