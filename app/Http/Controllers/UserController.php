<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.profile',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        
        $request->user()->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        return back();
    }

}
