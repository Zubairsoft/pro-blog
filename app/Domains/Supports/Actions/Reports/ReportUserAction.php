<?php

namespace Domains\Supports\Actions\Reports;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Supports\Reports\ReportUserRequest;
use App\Models\Report;
use App\Models\User;
use Domains\Supports\DataTransferToObject\ReportData;

class ReportUserAction
{
    public function __invoke(ReportUserRequest $request, string $id): void
    {
        $user = User::query()->findOrFail($id);

        $attributes = unsetArrayEmptyParam(ReportData::fromRequest($request)->toArray());

        if ($user->id === $attributes['writable_id']) {

            throw new LogicException(__('exceptions.self_user_report'), 422);
        }

        $user->reports()->firstOrCreate($attributes, $attributes);
    }
}
