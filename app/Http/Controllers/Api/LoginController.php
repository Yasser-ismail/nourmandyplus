<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request)
    {

        $user = User::Where('email', $request->email)->with('token')->first();
        $tokens = $user->token;
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                foreach ($tokens as $token) {
                    if ($token->token == $request->token && $token->device == $request->device) {
                        $user['passport_token'] = $user->createToken('TutsForWeb')->accessToken;
                        return $this->apiResponse($user, null, 202);
                    }
                }
                $user->token()->create(
                    [
                        'token' => $request->token,
                        'device' => $request->device,
                    ]
                );

                $user['passport_token'] = $user->createToken('TutsForWeb')->accessToken;

                return $this->apiResponse($user, null, 202);

            }
        }

        return $this->apiResponse(null, 'Not Found', 404);


    }
}
