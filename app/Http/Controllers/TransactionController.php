<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id)
    {
        $packages = Package::find($id);
        return view('transaction.index',[
            'package' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notransaksi' => 'required',
            'tgltransaksi' => 'required',
            'username' => 'required',
            'paket' => 'required',
            'totalharga' => 'required',
            'pembayaran' => 'required',
            'kembalian' => 'required',
            'tambahan' => 'required'
        ]);

        $trans = new Transactions();

        $pakettambahan = $request->tambahan;
        if($pakettambahan == 0){
            $pakettambahan = "Tidak Ada";
        } else if ($pakettambahan == 10000){
            $pakettambahan = "Wax";
        } else if ($pakettambahan == 20000) {
            $pakettambahan = "Fogging";
        };

        $id = auth()->user()->id;
        
        // $paket = (int)([',', '.', 'Rp', ' '], '', $request->paket;
        // $pembayaran = (int)str_replace([',', '.', 'Rp', ' '], '', $request->pembayaran);
        // $kembalian = (int)str_replace([',', '.', 'Rp', ' '], '', $request->kembalian);

        $trans->notransaksi = $request->notransaksi;
        $trans->tgltransaksi = $request->tgltransaksi;
        $trans->idpaketcuci = $request->idpaketcuci;
        $trans->iduser = $id;
        $trans->namapakettambahan = $pakettambahan;
        $trans->totalharga = $request->paket;
        $trans->kembalian = $request->kembalian;
        $trans->pembayaran = $request->pembayaran;
        $trans->save();

        return redirect()->route('index');
    }
}
