<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $videos = Video::published()->paginate(10);
        return $this->apiResponse($videos, null, 200);
    }

    public function show($id)
    {
        $video = Video::where('id', $id)
            ->published()
            ->with('comments', 'category', 'skills', 'tags')
            ->get();
        return $this->apiResponse($video, null, 200);

    }
}
