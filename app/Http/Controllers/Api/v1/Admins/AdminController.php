<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\AdminRequest;
use App\Http\Resources\Admins\AdminResource;
use Domains\Admins\Actions\Admins\DestroyAdminAction;
use Domains\Admins\Actions\Admins\IndexAdminAction;
use Domains\Admins\Actions\Admins\ShowAdminAction;
use Domains\Admins\Actions\Admins\StoreAdminAction;
use Domains\Admins\Actions\Admins\UpdateAdminAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handel the incoming request for index admin
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $admins = (new IndexAdminAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $admins);
    }

    /**
     * Handle the incoming request for store admin
     * 
     * @param AdminRequest $request
     * 
     * @return JsonResponse
     */
    public function store(AdminRequest $request): JsonResponse
    {
        $admin = (new StoreAdminAction)($request);

        return sendSuccessResponse(__('messages.create_data'), AdminResource::make($admin));
    }

    /**
     * Handle the incoming request for show admin
     * 
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $admin = (new ShowAdminAction())($id);

        return sendSuccessResponse(__('messages.get_data'), AdminResource::make($admin));
    }

    /**
     * Handle the incoming request for update admin
     * 
     * @param AdminRequest $request
     * 
     * @return JsonResponse
     */
    public function update(AdminRequest $request, string $id): JsonResponse
    {
        $admin = (new UpdateAdminAction)($request, $id);

        return sendSuccessResponse(__('messages.update_data'), AdminResource::make($admin));
    }

    /**
     * Handle the incoming request for delete admin
     * 
     * @param AdminRequest $request
     * 
     * @return JsonResponse
     */
    public function  destroy(AdminRequest $request): JsonResponse
    {
        $admin = (new DestroyAdminAction)($request);

        return sendSuccessResponse(__('messages.delete_data'), $admin);
    }
}
