<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JenisModel;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'nama',
        'jenis_id',
        'nominal',
        'status',
        'tanggal'
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisModel::class, 'jenis_id');
    }
}
