<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Css/DataTransaksi.css">
<title>Laporan Transaksi</title>
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
        <li><a href="{{ route('Transaksi.create') }}">Tambah Transaksi</a></li>
        <li class="active"><a href="{{ route('Transaksi.history') }}">Data Transaksi</a></li>
      </ul>
</div>

<div class="main-content">

    <div class="header">
        <h2>Laporan Transaksi</h2>
    </div>

    <div class="summary">
        <div class="summary-card">
            <p>Total Transaksi</p>
            <h3>{{ $totalTransaksi }}</h3>
        </div>
        <div class="summary-card">
            <p>Total Nominal</p>
            <h3>{{ number_format($totalNominal, 0 , ',', '.') }}</h3>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $item)                
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{number_format($item->nominal, 0 , ',', '.') }}</td>
                <td>@if ($item->status == 'lunas')
                <span class="badge lunas">Lunas</span>
                @else
                <span class="badge hutang">Hutang</span>
                @endif
                </td>
                <td>
                  <button class="btn-update">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                      <path
                        d="M4 4v6h6M20 20v-6h-6"
                        stroke="currentColor"
                        stroke-width="2"
                      />
                      <path
                        d="M20 9a7 7 0 0 0-12-4M4 15a7 7 0 0 0 12 4"
                        stroke="currentColor"
                        stroke-width="2"
                      />
                    </svg>
                  </button>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</body>
</html>