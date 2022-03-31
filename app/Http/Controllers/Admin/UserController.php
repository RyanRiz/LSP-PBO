<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',[
            'users' => $users
        ]);
    }

    public function show(){
        return view('admin.user.add');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|unique:tbuser,username',
            'password' => 'required'
        ]);

        $data = new User();
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('admin.user');
    }

    public function tampil($id){
        $user = User::find($id)->first();
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update ($id, Request $request){
        $user = User::find($id)->first();

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('admin.user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('admin.user');
    }
}
