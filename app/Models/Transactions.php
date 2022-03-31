<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'tbtransaksi';

    protected $fillable = [
        'notransaksi',
        'tgltransaksi',
        'iduser',
        'idpaketcuci',
        'namapakettambahan',
        'totalharga',
        'pembayaran',
        'kembalian',
    ];
}
