<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create-posts'],
            ['name' => 'edit-posts'],
            ['name' => 'delete-posts'],
            ['name' => 'view-posts'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
