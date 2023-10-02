<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $admin = Auth::user();

        $post = $admin->posts()->create($data);

       // $post->addMedia($data['poster'])->toMediaCollection('poster');

        $post->tags()->sync($data['tags']);

        return $post;
    }
}
