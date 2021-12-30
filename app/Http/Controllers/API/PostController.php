<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Validator;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class PostController extends BaseController
{

    public function index(Request $request)
    {
        $redisPosts = Redis::get('posts');

        if (!isset($request->id)) {
            $posts = json_decode($redisPosts);
        } else {
            $posts = DB::table('post_categories as pc')
                ->select(
                    'p.id',
                    'p.content',
                    'p.created_at',
                    'p.updated_at',
                )
                ->leftJoin('posts AS p', 'pc.post_id', '=', 'p.id')
                ->where('pc.category_id', '=', $request->id)
                ->get();
        }

        return $this->sendResponse(PostResource::collection($posts), 'Lista postów.');
    }
}
