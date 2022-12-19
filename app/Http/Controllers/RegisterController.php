<?php

namespace App\Http\Controllers;


use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function action(RegisterRequest $request){
        $user = User::create([
            'name'=>$request['name'],
            'cognome'=>$request['cognome'],
            'telefono'=>$request['telefono'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),          
        ]);
       // $user->assignRole('Professional');
   
        
        if($user!=null){
            event(new UserRegisteredEvent($user));
        };
        return $user;
    }
}
