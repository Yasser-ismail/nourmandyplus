<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\StoreRequest;
use App\Http\Requests\BackEnd\Skills\UpdateRequest;
use App\Models\Skill;

class SkillsController extends BackEndController
{

    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }


    public function store(StoreRequest $request)
    {

        $input = $request->all();

        Skill::create($input);

        return redirect('admin/skills');

    }


    public function update(UpdateRequest $request, $id)
    {

        $row = Skill::findOrFail($id);


        $input = $request->all();


        $row->update($input);


        return redirect()->route('skills.index');

    }
}
