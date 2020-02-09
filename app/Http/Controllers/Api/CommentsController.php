<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Comments\StoreRequest;
use App\Http\Requests\Api\Comments\UpdateRequest;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    use ApiResponseTrait;

    public function store(StoreRequest $request, $id)
    {
        $video = Video::find($id);
        if ($video) {
            $request['user_id'] = auth()->user()->id;
            $request['video_id'] = $video->id;
            $comment = Comment::create($request->all());

            return $this->apiResponse($comment, null, 201);

        }

        return $this->apiResponse(null, 'Video Not Found', 404);

    }

    public function update(UpdateRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->user()->id == $comment->user->id) {


            $comment->update($request->all());

            return $this->apiResponse($comment, null, 202);
        }

        return $this->apiResponse(null, 'Video Not Found', 404);


    }

    public function delete($id)
    {

        $comment = Comment::find($id);
        if($comment){
            if (auth()->user()->id == $comment->user->id) {
                $comment->delete();
                return $this->apiResponse(true, null, 200);
            }else{
                return $this->apiResponse(null, 'not owner', 403);
            }
        }


        return $this->apiResponse(null, 'Not Found', 404);


    }
}
