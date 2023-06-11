<?php

namespace Database\Seeders;

use App\Models\Admin;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(1)->make()->each(
            function ($admin) {
                $admin->email='admin@admin.com';
                $admin->save();

                $admin->assignRole(RoleEnum::SUPER_ADMIN);
            }
        );
        
        Admin::factory(9)->make()->each(
            function ($admin) {
                $admin->save();

                $admin->assignRole(RoleEnum::ADMIN);
            }
        );

    }
}
