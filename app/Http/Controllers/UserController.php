<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function deactivateAccount()
    {
        $user = Auth::user();
        $user->is_active = false;
        $user->save();
        Auth::logout();

        return redirect()->route('register')->with('success', 'Your account has been deactivated.');
    }
}
