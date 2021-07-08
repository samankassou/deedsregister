<?php

namespace Database\Seeders;

use App\Models\Deed;
use Illuminate\Database\Seeder;

class DeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deed::factory(10)->create();
    }
}
