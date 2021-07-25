<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@scb.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(12)
        ])
            ->roles()->attach([1]);
        User::create([
            'name' => 'Saisisseur',
            'email' => 'writter@scb.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(12)
        ])
            ->roles()->attach([2]);
    }
}
