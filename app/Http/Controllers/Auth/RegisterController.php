<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|unique:tbuser,username',
            'password' => 'required|confirmed'
        ]);
        
        $user = new User();

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');
    }
}
