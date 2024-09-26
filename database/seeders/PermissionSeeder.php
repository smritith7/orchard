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
            ['title' => 'create-posts'],
            ['title' => 'edit-posts'],
            ['title' => 'delete-posts'],
            ['title' => 'view-posts'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
