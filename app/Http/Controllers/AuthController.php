<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserAccessToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate(User::rules()->only('email', 'password')->toArray());

        $userCollection = User::where('email', $request->email)->get();
        if($userCollection->count()==1)
        {
            $user = $userCollection->first();
            $userAccessToken = UserAccessToken::where('user_id', $user->id)->firstOrNew();
            $userAccessToken->token = hash('ripemd160', time());
            $userAccessToken->expired_at = now()->addDays(5);
            $userAccessToken->user_id = $user->id;
            $userAccessToken->save();

            if(Hash::check($request->password, $user->password))
            {
                return response()->json(['user' => $user, 'token' => $userAccessToken], Response::HTTP_OK);
            }
        }
        return response()->json(['message' => 'Invalid Credentials'], Response::HTTP_UNAUTHORIZED);
    }

    public function register(Request $request)
    {
        $request->validate(User::rules(true)
                             ->only('first_name', 'last_name', 'email', 'phone')
                             ->toArray());

        $user = new User();
        $user->fill($request->only('first_name', 'last_name', 'email', 'phone'));
        $user->password = Hash::make($request->password);
        $user->user_role_id = UserRole::MEMBER;
        $user->save();

        //write your mail logic inside events
        //event(new Registered($user));

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(User::rules()->only('email')->toArray());

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json(['message' => 'Email not found'], Response::HTTP_NOT_FOUND);
        }

        $token = sha1(Str::random(12).time());

        $passwordReset = DB::table('password_resets')->insert([
                              'email' => $request->email,
                              'token' => $token,
                              'created_at' => now()->toDateTimeString()
                            ]);

        if($passwordReset)
        {
            //write your mail logic inside events
            //event(new ForgotPasswordEvent($user));
            //Use blade to create EMail HTML template
            //Mail::to($user->email)->send(new ForgotPasswordMail($user, $token));
            return response()->json(['message' => 'Recovery mail has been sent to your email address'], Response::HTTP_OK);
        }

        return response()->json(['message' => 'Error sending mail'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function resetPassword(Request $request)
    {
        $request->validate(array_merge(User::rules()->only('password')->toArray(),
                                        ['token' => 'required|size:40']));

        $passwordReset = DB::table('password_resets')
                          ->where('token', $request->token)->orderBy('created_at', 'DESC')->first();

        if(!$passwordReset)
        {
            return response()->json(['message' => 'Token not found'], Response::HTTP_UNAUTHORIZED);
        }

        $diffInHours = now()->diffInHours($passwordReset->created_at);

        if($diffInHours >= 24)
        {
            return response()->json(['message' => 'Token expired'], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password updated successfully'], Response::HTTP_OK);
    }

}
