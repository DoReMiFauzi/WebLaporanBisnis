<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/tambahTransaksi.css') }}">

<title>Form Transaksi</title>
</head>
<body>

<div class="sidebar">
     <div class="logo">
        <div class="logo-icon">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M15 9a3 3 0 0 0-6 0c0 3 6 3 6 6a3 3 0 0 1-6 0"></path>
          </svg>
        </div>
        <span>MyBisnisGue</span>
      </div>
      <ul class="menu">
        <li><a href="{{ route('Transaksi.index') }}">Dashboard</a></li>
        <li class="active"><a href="{{ route('Transaksi.create') }}">Tambah Transaksi</a></li>
        <li><a href="{{ route('Transaksi.history') }}">Data Transaksi</a></li>
      </ul>
</div>

<div class="main-content">

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-card">
        <h2>Tambah Data</h2>
        <form action="{{ route('Transaksi.store') }}" method="post" autocomplete="off">
            @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan nama">
        </div>

        <div class="form-group">
            <label>Jenis</label>
            <select name="jenis_id" >
                <option value="" selected disabled>Pilih Jenis Transaksi</option>
                @foreach ($data as $item)             
                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nominal</label>
            <input type="number" name="nominal" placeholder="Masukkan nominal">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" >
                <option value="" selected disabled>Pilih Status</option>
                <option value="hutang">Hutang</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal">
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</div>

</body>
</html>