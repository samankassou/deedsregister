<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            //users management permissions
            ['name' => 'view-users'],
            ['name' => 'view-user'],
            ['name' => 'create-user'],
            ['name' => 'update-user'],
            ['name' => 'delete-user'],

            //agencies management permissions
            ['name' => 'view-agencies'],
            ['name' => 'view-agency'],
            ['name' => 'create-agency'],
            ['name' => 'update-agency'],
            ['name' => 'delete-agency'],

            //warranties management permissions
            ['name' => 'view-warranties'],
            ['name' => 'view-warranty'],
            ['name' => 'create-warranty'],
            ['name' => 'update-warranty'],
            ['name' => 'delete-warranty'],

            //deeds management permissions
            ['name' => 'view-deeds'],
            ['name' => 'export-deeds'],
            ['name' => 'view-deed'],
            ['name' => 'print-deed'],
            ['name' => 'create-deed'],
            ['name' => 'update-deed'],
            ['name' => 'delete-deed'],
            ['name' => 'forceDdelete-deed'],
            ['name' => 'restore-deed'],
        ]);

        /* Assign permissions to roles */
        Role::firstWhere('name', 'admin')->attachPermissions(Permission::all());

        Role::firstWhere('name', 'writter')->attachPermissions(
            Permission::whereIn('name', [
                'view-deeds',
                'view-deed',
                'print-deed',
                'export-deeds',
                'create-deed',
                'update-deed',
                'delete-deed',
            ])->get()
        );
    }
}
