<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use App\Http\Requests\BackEnd\Categories\StoreRequest;
use App\Http\Requests\BackEnd\Categories\UpdateRequest;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {

        $input = $request->all();

        Category::create($input);

        return redirect('admin/categories');

    }


    public function update(UpdateRequest $request, $id)
    {

        $row = Category::findOrFail($id);


        $input = $request->all();


        $row->update($input);


        return redirect()->route('categories.index');

    }

}
