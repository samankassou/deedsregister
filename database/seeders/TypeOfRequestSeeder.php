<?php

namespace Database\Seeders;

use App\Models\TypeOfRequest;
use Illuminate\Database\Seeder;

class TypeOfRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfRequest::insert([
            ['name' => 'Rédaction'],
            ['name' => 'Enregistrement'],
            ['name' => 'Inscription']
        ]);
    }
}
