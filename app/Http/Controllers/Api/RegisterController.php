<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    use ApiResponseTrait;

    public function register(RegisterRequest $request){
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());

        $user->token()->create([
            'token' => $request->token,
            'device' => $request->device,
        ]);


        $user['passport_token'] = $user->createToken('TutsForWeb')->accessToken;



        return $this->apiResponse($user, null, 201);

    }

//    public function storeComment(){
//        Comment::create([
//            'user_id' => auth()->id(),
//            'vid_id' => request('vid_id'),
//            'comment' => request('comment'),
//        ]);
//
//        return response()->json(
//          [
//              'message' => 1
//          ]
//        );
//    }
}

// function registerResponse($response){
//      $userToken = $response['token']
//
//
//
//
//
//
//
//
//}


//
//User(server)  < == >  User(from mobile)
//
//
//user_id , os , device_id
//
//user_id => create(user) => request from mobile
// os => request from mobile
//device_id => \request( from mobile)















