<?php

namespace Domains\Users\Actions\Posts;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Users\Posts\StoreReportPostRequest;
use App\Models\Post;
use Domains\Users\DataTransferToObject\ReportData;

class StoreReportPostAction
{
    public function __invoke(StoreReportPostRequest $request, string $id)
    {
        $user = getAuthenticatedUser();

        $attributes = unsetArrayEmptyParam(ReportData::fromRequest($request)->toArray());

        $post = Post::query()->active()->findOrFail($id);

        if ($user->id === $post->authorable_id) {
            throw new LogicException(__('exceptions.self_post_report'), 422);
        }

        $post->reports()->create($attributes);
    }
}
