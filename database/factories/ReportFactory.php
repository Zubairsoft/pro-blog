<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Domains\Admins\Enums\ReportStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posts = Post::query()->take(10)->get();

        $authors = Author::query()->take(5)->get();

        $comments = Comment::query()->take(15)->get();

        $reports = [...$posts, ...$comments, ...$authors];

        $writer = User::query()->get()->random();

        $report = Arr::random($reports);

        return [
            'id' => uuid_create(),
            'writable_id' => $writer->id,
            'writable_type' => get_class($writer),
            'reportable_id' => $report->id,
            'reportable_type' => get_class($report),
            'reason' => fake()->sentence(3),
            'status' => Arr::random(ReportStatusEnum::getValues())
        ];
    }
}
