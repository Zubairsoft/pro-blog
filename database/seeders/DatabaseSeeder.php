<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            AdminSeeder::class,
            AuthorSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            TagPostSeeder::class,
            CommentSeeder::class,
            ReplyCommentSeeder::class,
            ReportSeeder::class

        ]);
    }
}
