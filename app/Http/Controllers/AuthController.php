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
            $success['level'] =  $user->level;
            $success['point'] =  $user->point;
            $success['role'] =  $user->role;
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else
        {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 400);
        } 
    }

    /**
     * register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {    
        Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users|min:8|max:64',
            'name' => 'required|min:5|max:64',
            'password' => 'required|min:8|max:24',
        ]);
        if((User::where('email',$request->email)->first())||(User::where('email',$request->email)->first())){
            return response()->json(['message' => "Already register with this email!"], 403);
        }
        // validate the incoming request data
        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random(16);
        } //check if the token already exists and if it does, try again
        while (User::where('token', $token)->first());
        $password = Hash::make($request->password);
        if($request->level){
            switch ($request->level){
                case "N5":
                    $level = 5;
                    $point = USER::LV_N5;
                    break;
                case "N4":
                    $level = 4;
                    $point = USER::LV_N4;
                    break;
                case "N3":
                    $level = 3;
                    $point = USER::LV_N3;
                    break;
                case "N2":
                    $level = 2;
                    $point = USER::LV_N2;
                    break;
                case "N1":
                    $level = 1;
                    $point = USER::LV_N1;
                    break;
            }
        }
        //create a new invite record
        $new = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'token' => $token,
            'role' => USER::ROLE_USER,
            'level' => $level,
            'point' => $point,
            'password' => $password,
        ]);
        
        $message="";
        $message.="<h1>Hi ".$request->name."</h1>";
        $message.="<p>Hãy xác nhận email của bạn</p>";
        $message.="<h2>Xác nhận email tại đây <a href='http://localhost:3000/verify/".$token."'>Verify</a> </h2>";
        $data = 
            [
                'subject' => "Register Validation",
                'to'      => $request->email,
            ];
        // send the email
        Mail::send(array(), $data, function ($msg) use ($message,$data) 
        {
            $msg->to($data['to'])->subject($data['subject'])
            ->html($message);
        });
        return response()->json(['message' => 'verification request sent'], 200);
    }
    /**
     * accept register request api
     *
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        try {
            $user = User::where('token',$request->token)->first();
            if($user){
                $user->update([
                    'email_verified_at' => \Carbon\Carbon::now()
                ]);
                return response()->json(['message'=>'Welcome'], 200);
            }
            return response()->json(['error' => "Can't find this invitation"],404);
        }
        catch (Exceptions $e){
            return response()->json(['error'=> $e],400);
        }
    }
}
