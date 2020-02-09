<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    use ApiResponseTrait;

    public function show($id){
        $tag = Tag::find($id);
        if($tag){
            $videos = $tag->videos()->published()->paginate(10);

            $data = [
                'tag'=>$tag,
                'videos'=>$videos,
            ];

            return $this->apiResponse($data, null, 200);
        }

        return $this->apiResponse(nul, 'Not Found', 404);
    }
}
