<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Validator;

class AuthController extends BaseController
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
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 400);
        } 
    }
}
