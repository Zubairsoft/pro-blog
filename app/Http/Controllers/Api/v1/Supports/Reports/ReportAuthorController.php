<?php

namespace App\Http\Controllers\Api\v1\Supports\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supports\Reports\ReportAuthorRequest;
use Domains\Supports\Actions\Reports\ReportAuthorAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportAuthorController extends Controller
{
    /**
     * Handle the incoming request for report Author
     *
     * @param ReportAuthorRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function __invoke(ReportAuthorRequest $request, string $id): JsonResponse
    {
        (new ReportAuthorAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'));
    }
}
