<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'admin', 'display_name' => 'Administrateur'],
            ['name' => 'writter', 'display_name' => 'Saissiseur'],
        ]);
    }
}
