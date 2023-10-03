<?php

namespace Domains\Admins\Actions\Reports;

use App\Http\Resources\Admins\Reports\ReportResource;
use App\Models\Report;

class ShowReportAction
{
    public function __invoke(string $id)
    {
        $report = Report::query()->findOrFail($id);

        return ReportResource::make($report->load(['reportable', 'writable']));
    }
}
