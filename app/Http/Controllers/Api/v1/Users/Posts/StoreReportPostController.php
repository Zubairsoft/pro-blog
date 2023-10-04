<?php

namespace App\Http\Controllers\Api\v1\Users\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Posts\StoreReportPostRequest;
use Domains\Users\Actions\Posts\StoreReportPostAction;
use Illuminate\Http\JsonResponse;

class StoreReportPostController extends Controller
{
    /**
     * Handle the incoming request for report post 
     * 
     * @param StoreReportPostRequest $request
     * 
     * @return JsonResponse
     */
    public function __invoke(StoreReportPostRequest $request,string $id):JsonResponse
    {
        (new StoreReportPostAction)($request,$id);

        return sendSuccessResponse(__('messages.create_data'));
    }
}
