<?php

namespace Domains\Admins\Actions\Reports;

use App\Http\Requests\Admins\Reports\ReportRequest;
use App\Models\Report;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DestroyReportAction
{
    use AuthorizesRequests;

    public function __invoke(ReportRequest $request): void
    {
        $reports = Report::query()->whereIn('id', $request->ids)->get();

        foreach ($reports as $report) {
            $this->authorize('delete', $report);

            $report->delete();
        }
    }
}
