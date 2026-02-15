<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\JenisModel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi7Hari = TransaksiModel::where('tanggal', '>=', now()->subDays(7))
                        ->latest()
                        ->get();
        $transaksi30Hari = TransaksiModel::where('tanggal', '>=', now()->subDays(30))
                        ->sum('nominal');
        $uangLunas = TransaksiModel::where('status', 'lunas')->sum('nominal');
        $uangBelumLunas = TransaksiModel::where('status', 'hutang')->sum('nominal');
        return view('beranda', compact('uangLunas', 'uangBelumLunas','transaksi7Hari','transaksi30Hari' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = JenisModel::all();
        return view('tambahTransaksi' , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
            'nama' => 'required|string',
            'jenis_id' => 'required|exists:jenis_transaksi,id',
            'nominal' => 'required|numeric|min:500',
            'status' => 'required|string',
            'tanggal' => 'required|date'
            ]);
            TransaksiModel::create($data);
            return redirect()->route('Transaksi.index');
    }

    public function status($id)
    {
        $data = TransaksiModel::findOrFail($id);

        $data->update([
            'status' => 'lunas' 
        ]);

        return back();
    }

    public function history(Request $request)
    {

    $query = TransaksiModel::with('jenis');

    if ($request->status) {
        $query->where('status', $request->status);
    }

    $transaksi = $query->latest()->get();

    $totalTransaksi = $transaksi->count();
    $totalNominal = $transaksi->sum('nominal');

    return view('dataTransaksi', compact('transaksi', 'totalTransaksi', 'totalNominal'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
