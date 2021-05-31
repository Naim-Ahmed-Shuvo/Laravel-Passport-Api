<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\resetRequest;
use App\Mail\ForgotMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    "message" => "successfully loggged in",
                    "token" => $token,
                    "user" => $user
                ], 200);
            }
        } catch (Exception $ex) {
            return response([
                "message" => $ex,

            ], 400);
        }

        return response([
            "message" => "Invalid email or password",

        ], 400);
    }

    // register
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'Registration successfull',
                'token' => $token,
                'user' => $user
            ], 200);
        } catch (Exception $ex) {
            return response([
                "message" => $ex,

            ], 400);
        }

        return response([
            "message" => "Something wrong",

        ], 400);
    }

    //forgot password
    public function forgotPassword(ForgotRequest $request)
    {
        if (User::where('email', $request->email)->doesntExist()) {
            return response([
                "message" => "Email doesn't exists"
            ], 404);
        }

        $token = rand(10, 1000000);

        try {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token
            ]);

            Mail::to($request->email)->send(new ForgotMail($token));

            return response([
                'message' => 'reset password sent on your email'
            ], 201);
        } catch (Exception $ex) {
            return response([
                'message' => $ex
            ], 500);
        }
    }

    //reset password
    public function resetPassword(resetRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $resetEmail = DB::table('password_resets')->where('email', $email)->first();
        $resetToken = DB::table('password_resets')->where('token', $token)->first();

        if (!$resetEmail) {
            return response([
                "message" => "Email not found"
            ], 404);
        }

        if (!$resetToken) {
            return response([
                "message" => "Token not found"
            ], 404);
        }

        DB::table('users')->where('email', $email)->update([
            'password' => $password
        ]);

        DB::table('password_resets')->where('email', $email)->delete();

        return response([
            "message" => "Password changed successfully"
        ], 200);
    }
}
