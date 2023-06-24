<?php

namespace Database\Factories;

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
        $author = Author::query()->active()->pluck('id');
        $faker = fake('SA_ar');
        $booleanValues=[true,false];
        return [
            'title_ar' => $faker->title(),
            'description_ar' => $faker->paragraph(),
            'title_en' => fake()->title(),
            'description_en' => fake()->paragraph(),
            'status' => Arr::random($booleanValues),
            'is_publish_ar'=>Arr::random($booleanValues),
            'is_publish_en'=>Arr::random($booleanValues),
            'author_id' => $author->random()
        ];
    }
}
