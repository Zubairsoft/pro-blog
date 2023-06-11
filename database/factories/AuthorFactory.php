<?php

namespace Database\Factories;

use Domains\Supports\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'first_name'=>fake()->firstName(),
         'last_name'=>fake()->lastName(),
         'gender'=>Arr::random(GenderEnum::getValues()),
         'email'=>fake()->email(),
         'password'=>bcrypt(123456789),
         'email_verified_at'=>fake()->dateTimeBetween(Carbon::now()->subYears(2)),
         'is_active'=>Arr::random([true,false])
        ];
    }
}
