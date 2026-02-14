<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiModel;

class JenisModel extends Model
{
    protected $table = 'jenis_transaksi';

    protected $fillable = [
        'jenis'
    ];

    public function transaksi()
    {
        return $this->hasMany(TransaksiModel::class, 'jenis_id');
    }
}
