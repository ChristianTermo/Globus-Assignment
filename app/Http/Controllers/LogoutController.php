<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        auth()->logout();
        return response()->json('logout succeded');
       // return CustomResponse::setSuccessResponse(Lang::get('auth.logout'), Response::HTTP_OK, null, null);
    }
}
