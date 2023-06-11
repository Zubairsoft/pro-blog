<?php

namespace Database\Seeders;

use Domains\Supports\Traits\DefaultSeeder\RoleAndPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    use RoleAndPermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect($this->roles())->each(
            fn ($role) =>
            Role::query()->firstOrCreate($role)
        );
    }
}
