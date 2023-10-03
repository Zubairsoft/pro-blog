<?php

namespace Domains\Admins\Actions\Reports;

use App\Http\Requests\Admins\Reports\ReportRequest;
use App\Models\Report;
use Domains\Admins\Enums\ReportStatusEnum;

class UpdateReportAction
{
    public function __invoke(ReportRequest $request)
    {
        $reports = Report::query()->whereIn('id', $request->ids);

        $reports->update(['status'=>ReportStatusEnum::getValue($request->status)]);

    }
}
