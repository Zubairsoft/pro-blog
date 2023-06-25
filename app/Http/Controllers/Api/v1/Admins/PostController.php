<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\PostRequest;
use Domains\Admins\Actions\Posts\DestroyPostAction;
use Domains\Admins\Actions\Posts\IndexOwnPostAction;
use Domains\Admins\Actions\Posts\IndexPostAction;
use Domains\Admins\Actions\Posts\ShowPostAction;
use Domains\Admins\Actions\Posts\StorePostAction;
use Domains\Admins\Actions\Posts\UpdatePostAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
   * Handle the incoming request for fetch all post
   * 
   * @param Request $request
   * 
   * @return JsonResponse
   */
  public function index(Request $request): JsonResponse
  {
    $posts = (new IndexPostAction)($request);

    return sendSuccessResponse(__('messages.get_data'), $posts);
  }

  /**
   * Handle the incoming request for fetch own posts
   * 
   * @param Request $request
   * 
   * @return JsonResponse
   */
  public function indexOwn(Request $request): JsonResponse
  {
    $posts = (new IndexOwnPostAction)($request);

    return sendSuccessResponse(__('messages.get_data'), $posts);
  }

  /**
   * Handle the incoming request for store post
   * 
   * @param PostRequest $request
   * 
   * @return JsonResponse
   */
  public function store(PostRequest $request): JsonResponse
  {
    $post = (new StorePostAction)($request);

    return sendSuccessResponse(__('messages.create_data'), $post);
  }

  /**
   * Handle the incoming request for show specific post
   * 
   * @param string $id
   * 
   * @return JsonResponse
   */
  public function show(string $id): JsonResponse
  {
    $post = (new ShowPostAction)($id);

    return sendSuccessResponse(__('messages.get_data'), $post);
  }

  /**
   * Handle the incoming request for update specific post
   * 
   * @param PostRequest $request
   * @param string $id
   * 
   * @return JsonResponse
   */
  public function update(PostRequest $request, string $id): JsonResponse
  {
    $post = (new UpdatePostAction)($request, $id);

    return sendSuccessResponse(__('messages.update_data'), $post);
  }

  /**
   * Handle the incoming request for delete post
   * 
   * @param PostRequest $request
   * 
   * @return JsonResponse
   */
  public function destroy(PostRequest $request): JsonResponse
  {
    $post = (new DestroyPostAction)($request);

    return sendSuccessResponse(__('messages.get_data'), $post);
  }
}
