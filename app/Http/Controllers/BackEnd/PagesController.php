<?php

namespace App\Http\Controllers\BackEnd;



use App\Http\Requests\BackEnd\Pages\StoreRequest;
use App\Http\Requests\BackEnd\Pages\UpdateRequest;
use App\Models\Page;

class PagesController extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }


    public function store(StoreRequest $request)
    {

        $input = $request->all();

        Page::create($input);

        return redirect('admin/pages');

    }


    public function update(UpdateRequest $request, $id)
    {

        $row = Page::findOrFail($id);


        $input = $request->all();


        $row->update($input);


        return redirect()->route('pages.index');

    }
}
