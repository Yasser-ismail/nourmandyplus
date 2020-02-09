<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\StoreRequest;
use App\Http\Requests\BackEnd\Videos\UpdateRequest;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;


class VideosController extends BackEndController
{
    use CommentsTrait;

    public function __construct(video $model)
    {
        parent::__construct($model);
    }

    protected function append()
    {

        return [

            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
        ];
    }


    public function store(StoreRequest $request)
    {
        $file = $request->file('image');
        $name = '/images/' . time() . $file->getClientOriginalName();
        $file->move('images', $name);
        $input = $request->all();

        $input['image'] = $name;

        $video = Video::create($input);

        if (isset($input['skill_id']) && !empty($input['skill_id'])) {
            $video->skills()->sync($input['skill_id']);
        }

        if (isset($input['tags_id']) && !empty($input['tags_id'])) {
            $video->tags()->sync($input['tags_id']);
        }


        return redirect()->route('videos.index');
    }


    public function update(UpdateRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $input = $request->all();

        if (request()->has('image')) {
            unlink(public_path() . $video->image);
            $file = $request->file('image');
            $name = '/images/' . time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;

        }

        if (isset($input['skill_id']) && !empty($input['skill_id'])) {
            $video->skills()->sync($input['skill_id']);
        } else {
            if ($video->skills()->get()) {
                $video->skills()->detach();
            }
        }

        if (isset($input['tags_id']) && !empty($input['tags_id'])) {
            $video->tags()->sync($input['tags_id']);
        } else {
            if ($video->tags()->get()) {
                $video->tags()->detach();
            }
        }


        $video->update($input);

        return redirect()->route('videos.index');
    }


    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        unlink(public_path() . $video->image);
        if ($video->skills) {
            $video->skills()->detach();
        }

        if ($video->tags) {
            $video->tags()->detach();
        }

        $video->delete();
        return redirect()->back();

    }
}
