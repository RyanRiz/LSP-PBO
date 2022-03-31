<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
            $transaction = Package::all();
            return view('index',[
                'transactions' => $transaction
            ]);
    }
}
