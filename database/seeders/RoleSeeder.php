<?php

namespace Database\Seeders;

use Domains\Supports\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::query()->create([
            'name' => RoleEnum::SUPER_ADMIN
        ]);

        Role::query()->create([
            'name' => RoleEnum::ADMIN
        ]);

        Role::query()->create([
            'name' => RoleEnum::AUTHOR
        ]);

        Role::query()->create([
            'name' => RoleEnum::USER
        ]);
    }
}
