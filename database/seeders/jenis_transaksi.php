<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisModel;

class jenis_transaksi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        ['jenis' => 'Top Up Dana'],
        ['jenis' => 'Top Up Pulsa'],
        ['jenis' => 'Top Up Token Listrik'],
        ['jenis' => 'Top Up Game']
        ];

        foreach($data as $item){
            JenisModel::create($item);
        }
    }
}
