<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $skills = Skill::all();

        return $this->apiResponse($skills, null, 200);
    }

    public function show($id){
        $skill = Skill::find($id);
        if($skill){
            $videos = $skill->videos()->published()->paginate(10);

            $data = [
                'skill'=>$skill,
                'videos'=>$videos,
            ];

            return $this->apiResponse($data, null, 200);
        }

        return $this->apiResponse(nul, 'Not Found', 404);
    }
}
