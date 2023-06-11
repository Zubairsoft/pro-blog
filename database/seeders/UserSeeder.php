<?php

namespace Database\Seeders;

use App\Models\User;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->make()->each(function ($user) {
            $user->save();
            $user->assignRole(RoleEnum::USER);
        });
    }
}
