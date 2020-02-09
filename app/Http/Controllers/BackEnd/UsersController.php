<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\UsersRequest;
use App\Http\Requests\BackEnd\Users\UsersUpdateRequest;
use App\Models\User;
use App\Http\Controllers\BackEnd\BackEndController;

class UsersController extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function store(UsersRequest $request)
    {

        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('admin/users');

    }


    public function update(UsersUpdateRequest $request, $id)
    {

        $row = User::findOrFail($id);


        if ($request->password == '') {

            $input = $request->except('password');
        } else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        $row->update($input);


        return redirect()->route('users.index');

    }


//    protected function filter($rows)
//    {
//        if(request()->has('name') && request()->get('name') != ''){
//            $rows = $rows->where('name', request()->get('name'));
//
//        }
//        return $rows;
//    }

}
