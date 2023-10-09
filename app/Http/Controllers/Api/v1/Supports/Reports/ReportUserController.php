<?php

namespace App\Http\Controllers\Api\v1\Supports\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supports\Reports\ReportUserRequest;
use Domains\Supports\Actions\Reports\ReportUserAction;
use Illuminate\Http\JsonResponse;

class ReportUserController extends Controller
{
    /**
     * Handle the incoming request for report user
     *
     * @param ReportUserRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function __invoke(ReportUserRequest $request, string $id): JsonResponse
    {
        (new ReportUserAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'));
    }
}
