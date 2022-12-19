<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Utils\CustomResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('name',  'password');
        try {
            if (!$token = Auth::attempt($credentials)) {
                return response()->json('credenziali errate');
                //  $errorrMSG=Lang::get('auth.credential_incorrect');
                // return CustomResponse::setFailResponse($errorrMSG, Response::HTTP_NOT_ACCEPTABLE, []);
            }
        } catch (JWTException $e) {
            return response()->json('login fallito');
        }
        /*  return response()->json([
            'token' => $token,
      ]);*/
        return CustomResponse::setSuccessResponse("",200, 'token', $token,);
    }
}
