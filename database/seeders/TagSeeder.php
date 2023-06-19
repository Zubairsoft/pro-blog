<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Tag;
use Domains\Supports\Traits\DefaultSeeder\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TagSeeder extends Seeder
{
    use Tags;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = Admin::query()->pluck('id')->toArray();

        $tags = collect($this->tags())->map(fn ($tag) => [
            'id' => uuid_create(),
            'name_en' => $tag['name_en'],
            'name_ar' => $tag['name_ar'],
            'admin_id' => Arr::random($admins),
            'is_active' => Arr::random([true, false])
        ])->toArray();

        Tag::query()->insert($tags);
    }
}
