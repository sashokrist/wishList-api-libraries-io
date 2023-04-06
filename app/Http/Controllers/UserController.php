<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function storeUser(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user);
    }

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

        $credentials = $request->only($this->username(), 'password');
        $user = \Illuminate\Foundation\Auth\User::where($this->username(), $credentials[$this->username()])->first();

        if (!$user || !$user->is_active) {
            session()->flash('error', 'Account is deactivated');
            return redirect()->back()->withInput();
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('register');
        } else {
            session()->flash('error', 'Invalid credentials');
            return redirect()->back()->withInput();
        }
    }
    public function deactivateAccount()
    {
        $user = Auth::user();
        $user->is_active = false;
        $user->save();
        Auth::logout();

        return redirect()->route('register')->with('success', 'Your account has been deactivated.');
    }
}
