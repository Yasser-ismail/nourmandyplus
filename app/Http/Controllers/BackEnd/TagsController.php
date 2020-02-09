<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\StoreRequest;
use App\Http\Requests\BackEnd\Tags\UpdateRequest;
use App\Models\Tag;


class TagsController extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }


    public function store(StoreRequest $request)
    {

        $input = $request->all();

        Tag::create($input);

        return redirect('admin/tags');

    }


    public function update(UpdateRequest $request, $id)
    {

        $row = Tag::findOrFail($id);


        $input = $request->all();


        $row->update($input);


        return redirect()->route('tags.index');

    }
}
