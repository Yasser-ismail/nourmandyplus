<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $categories = Category::all();

        return $this->apiResponse($categories, null, 200);
    }

    public function show($id){
        $category = Category::find($id);
        if($category){
            $videos = Video::where('category_id', $category->id)->published()->paginate(10);

            $data = [
                'category'=>$category,
                'videos'=>$videos,
            ];

            return $this->apiResponse($data, null, 200);
        }

        return $this->apiResponse(nul, 'Not Found', 404);
    }
}
