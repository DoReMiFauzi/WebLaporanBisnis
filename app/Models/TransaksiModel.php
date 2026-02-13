<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'nama',
        'jenis',
        'nominal',
        'status',
        'tanggal'
    ];
}
