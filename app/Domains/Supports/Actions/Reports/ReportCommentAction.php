<?php

namespace Domains\Supports\Actions\Reports;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Supports\Reports\ReportCommentRequest;
use App\Models\Comment;
use Domains\Supports\DataTransferToObject\ReportData;

class ReportCommentAction
{
    public function __invoke(ReportCommentRequest $request, string $id): void
    {
        $comment = Comment::query()->findOrFail($id);

        $attributes = unsetArrayEmptyParam(ReportData::fromRequest($request)->toArray());

        if ($comment->userable_id === $attributes['writable_id'] and $comment->userable_type === $attributes['writable_type']) {

            throw new LogicException(__('exceptions.self_comment_report'), 422);
        }

        $comment->reports()->firstOrCreate($attributes);
    }
}
