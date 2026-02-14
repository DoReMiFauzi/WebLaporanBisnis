<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/beranda.css') }}">
    <title>Beranda</title>
  </head>
  <body>
    <!-- SideBar -->
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
        <li class="active"><a href="{{ route('Transaksi.index') }}">Dashboard</a></li>
        <li><a href="{{ route('Transaksi.create') }}">Tambah Transaksi</a></li>
        <li><a href="{{ route('Transaksi.history') }}">Data Transaksi</a></li>
      </ul>
    </div>

    <div class="main-content">
      <div class="hero">
        <div class="hero-content">
          <div class="hero-text">
            <h1>Dashboard Overview</h1>
            <p>
              Selamat datang kembali. Berikut ringkasan data terbaru hari ini.
            </p>

            <div class="hero-buttons">
              <a href="{{ route('Transaksi.create') }}">
                <button class="btn-primary">Tambah Data</button>
              </a>
              <a href="{{ route('Transaksi.history') }}">
              <button class="btn-secondary">Lihat Laporan</button>
              </a>
            </div>
          </div>

          <div class="hero-stats">
            <div class="stats-card">
              <span>Total Bulan Ini</span>
              <h2>Rp {{ number_format($transaksi30Hari, 0, ',', '.') }}</h2>
            </div>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="card-container">
        <div class="card">
          <div class="card-icon">
            <svg
              width="30"
              height="30"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <circle cx="12" cy="12" r="9"></circle>
              <path d="M15 9a3 3 0 0 0-6 0c0 3 6 3 6 6a3 3 0 0 1-6 0"></path>
            </svg>
          </div>
          <div class="card-info">
            <h3>Uang Lunas</h3>
            <h5>Total : @if ($uangLunas == 0)
              Maaf Belum Ada Transaksi 
            @else
            Rp {{ number_format($uangLunas, 0 , ',', '.') }}
            @endif
            </h5> 
          </div>
        </div>
        <div class="card card-pinjam">
          <div class="card-icon" style="color: #ef4444">
            <svg
              width="30"
              height="30"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <circle cx="12" cy="12" r="9"></circle>
              <path d="M15 9a3 3 0 0 0-6 0c0 3 6 3 6 6a3 3 0 0 1-6 0"></path>
            </svg>
          </div>
          <div class="card-info">
            <h3>Uang Belum Lunas</h3>
            <h5>Total : @if ($uangBelumLunas == 0)
              Maaf Belum Ada Transaksi 
            @else
            Rp {{ number_format($uangBelumLunas, 0 , ',', '.') }}
            @endif
            </h5> 
          </div>
        </div>
      </div>

      <!-- Table -->

      <div class="table-container">
        <h2>Histori 7 Hari Terakhir</h2>

        <div class="table-wrapper">
          <table class="history-table">
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
              @if ($transaksi7Hari->isEmpty())
                  <td colspan="7" style="color: grey">Maaf Data 7 Hari Terakhir Belum Ada</td>
              @endif
              @foreach ($transaksi7Hari as $item)                
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jenis->jenis }}</td>
                <td>Rp {{number_format($item->nominal, 0 , ',', '.') }}</td>
                <td>@if ($item->status == 'lunas')
                <span class="badge lunas">Lunas</span>
                @else
                <span class="badge hutang">Hutang</span>
                @endif
                </td>
                <td>
                  <form action="{{ route('Transaksi.status', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if ($item->status == 'hutang')                
                    <button type="submit" class="btn-update">
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
                    @else
                    <button type="button" class="btn-update" onclick="alert('Transaksi Ini Sudah Lunas')" >
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
                    @endif
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
