<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        { 
            $user = Auth::user();
            $success['id'] =  $user->id; 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['role'] =  $user->role;
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else
        {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
