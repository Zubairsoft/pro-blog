<?php

namespace Domains\Supports\Actions\Reports;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Supports\Reports\ReportAuthorRequest;
use App\Models\Author;
use Domains\Supports\DataTransferToObject\ReportData;

class ReportAuthorAction
{
    public function __invoke(ReportAuthorRequest $request, string $id): void
    {
        $author = Author::query()->findOrFail($id);

        $attributes = unsetArrayEmptyParam(ReportData::fromRequest($request)->toArray());

        if ($author->id === $attributes['writable_id']) {

            throw new LogicException(__('exceptions.self_user_report'), 422);
        }

        $author->reports()->firstOrCreate($attributes);
    }
}
