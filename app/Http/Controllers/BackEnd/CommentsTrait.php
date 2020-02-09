<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\StoreRequest;
use App\Models\Comment;
use App\Models\Video;

trait CommentsTrait
{

    public function storecomments(StoreRequest $request)
    {

        Comment::create($request->all());

        return redirect()->route('videos.edit', ['id' => $request->video_id, '#comments']);

    }

    public function updatecomment($id, StoreRequest $request){
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return redirect()->route('videos.edit', ['id' => $comment->video_id, '#comments']);
    }


    public function deletecomment($id)
    {
        $comment =Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('videos.edit', ['id' => $comment->video_id, '#comments']);
    }

}
