<?php

namespace Database\Seeders;

use App\Models\Author;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(30)->make()->each(function ($author) {
            $author->save();
            $author->assignRole(RoleEnum::AUTHOR);
        });
    }
}
