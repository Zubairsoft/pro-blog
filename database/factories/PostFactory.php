<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin = Admin::query()->get();
        //  $author = Author::query()->get();
        $faker = fake('SA_ar');
        $booleanValues = [true, false];
        $author = $admin->random();
        return [
            'id' => uuid_create(),
            'title_ar' => $faker->title(),
            'description_ar' => $faker->paragraph(),
            'title_en' => fake()->title(),
            'description_en' => fake()->paragraph(),
            'status' => Arr::random($booleanValues),
            'is_publish_ar' => Arr::random($booleanValues),
            'is_publish_en' => Arr::random($booleanValues),
            'authorable_id' => $author->id,
            'authorable_type' => $author instanceof Admin ? Admin::class : Author::class
        ];
    }
}
