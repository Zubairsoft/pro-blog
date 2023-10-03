<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Reports\ReportRequest;
use Domains\Admins\Actions\Reports\DestroyReportAction;
use Domains\Admins\Actions\Reports\IndexReportAction;
use Domains\Admins\Actions\Reports\ShowReportAction;
use Domains\Admins\Actions\Reports\UpdateReportAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Handle the incoming request for index action
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $reports = (new IndexReportAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $reports);
    }

    /**
     * Handle the incoming request for show report
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $report = (new ShowReportAction)($id);

        return sendSuccessResponse(__('messages.get_data'), $report);
    }

    /**
     * @param ReportRequest $request
     *
     * @return JsonResponse
     */
    public function update(ReportRequest $request): JsonResponse
    {
        (new UpdateReportAction)($request);

        return sendSuccessResponse(__('messages.update_data'));
    }

    /**
     * Handle the incoming request for destroy reports,
     * 
     * @param ReportRequest $request
     *
     * @return JsonResponse
     */
    public function destroy(ReportRequest $request): JsonResponse
    {
        (new DestroyReportAction)($request);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
