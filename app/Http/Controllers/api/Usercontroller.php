<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class Usercontroller extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Notification::send($user, new WelcomeNotification($user));
        return response()->json([
            "Staus" => "1",
            "user" => $user,
            "message" => "User Created with successfull and verify your emailBox"
        ]);
    }
    public function listUser()
    {
        $users = User::all();
        return response()->json([
            "Staus" => "1",
            "user" => $users,
            "message" => " all  Users of database"
        ]);
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user) {
            return response()->json([
                "Staus" => "1",
                "user" => $user,
                "message" => " This User data is deleted successfull"
            ]);
        } else {
            return response()->json([
                "Staus" => "0",
                "message" => " Error,We don't find this User"
            ]);
        }
    }
    public function  login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token =  $user->createToken('auth_token')->plainTextToken;
                // Auth::login($user);

                return response()->json([
                    "Staus" => "1",
                    "info" => "Welcome " . $request->name,
                    "access" => $token
                ]);
            } else {
                return response()->json([
                    "Staus" => "0",
                    "info" => "Your accreditials are incorrect,retry"
                ]);
            }
        } else {
            return response()->json([
                "Staus" => "0",
                "info" => "This User don't exist in our database"
            ]);
        }
    }

    public function logout()
    {
        Auth::user()->tokens->delete();
        // Auth::user()->tokens->revoke();
        return response()->json([
            "Staus" => "1",
            "info" => "Deconnexion successfull"
        ]);
    }
}
