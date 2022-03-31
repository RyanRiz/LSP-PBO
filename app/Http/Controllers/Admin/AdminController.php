<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = User::get()->count();
        $data = Transactions::get()->count();
        return view('admin.index',[
            'user' => $user,
            'transaction' => $data
        ]);
    }
}
