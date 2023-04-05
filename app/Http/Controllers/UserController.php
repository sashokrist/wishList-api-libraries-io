<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'You are registered.');
    }

//    public function login(Request $request)
//    {
//        $data = $request->validate([
//            'email' => 'email|required',
//            'password' => 'required'
//        ]);
//
//        if (!auth()->attempt($data)) {
//            return response(['error_message' => 'Incorrect Details.
//            Please try again']);
//        }
//
//       // $token = auth()->user()->createToken('API Token')->accessToken;
//
//        return redirect()->route('home');
//
//    }
    public function deactivateAccount()
    {
        $user = Auth::user();
        $user->is_active = false;
        $user->save();
        Auth::logout();

        return redirect()->route('register')->with('success', 'Your account has been deactivated.');
    }
}
