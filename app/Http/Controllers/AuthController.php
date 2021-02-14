<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\{RegisterRequest,LoginRequest};
use Illuminate\Http\Request;
use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Lang;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        //$validate = Validator::validate($request->all());
        $validated = $request->validated();
        
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_token' => Str::random(60),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        
        //$user = User::firstWhere('email', $request->email);

        //$user->notify(new VerifyEmail($user->activation_token) );

        // send verification mail

        return response()->json([
            'message' => 'you have successfully registered',
            'user' => $user
        ], http_response_code(201));
    }

    public function verifyAccountEmail($activation_token)
    {
        if($user = User::where('activation_token', $activation_token)->first())
        {
            $user->is_email_verified = true;
            $user->save();
            $message = trans('messages.user.success.verify_account');
            $http_status_code = http_response_code(200);
        }
        else
        {
            $message = trans('messages.user.error.not_found');
            $http_status_code = http_response_code(404);
        }

        return response()->json(['message' => $message ], $http_status_code);

    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        
    }

    public function logout()
    {
        
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
