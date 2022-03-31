<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $data = Transactions::all();
        return view('admin.transaction.show',[
            'datas' => $data
        ]);
    }
}
