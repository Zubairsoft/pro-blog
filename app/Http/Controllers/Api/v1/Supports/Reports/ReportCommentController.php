<?php

namespace App\Http\Controllers\Api\v1\Supports\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supports\Reports\ReportCommentRequest;
use Domains\Supports\Actions\Reports\ReportCommentAction;
use Illuminate\Http\JsonResponse;

class ReportCommentController extends Controller
{
    /**
     * Handle the incoming request for report comment
     *
     * @param ReportCommentRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function __invoke(ReportCommentRequest $request, string $id): JsonResponse
    {
        (new ReportCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'));
    }
}
