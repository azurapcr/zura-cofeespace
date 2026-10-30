
@extends('layouts.admin')

@section('title', 'Dashboard | Coffee Space')

@section('content')

<style>
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-stats .coffee-card {
        padding: 22px;
        min-width: 0;
    }

    .dashboard-stats h3,
    .dashboard-stats h4 {
        font-size: 23px;
        overflow-wrap: anywhere;
    }

    .dashboard-stats a {
        text-decoration: none;
    }

    .dashboard-stats a:hover {
        color: #C69A6B;
    }

    @media (max-width: 1200px) {
        .dashboard-stats {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .dashboard-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .dashboard-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Judul Dashboard -->
<div class="mb-4">
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">
        Selamat datang di sistem manajemen Coffee Space.
    </p>
</div>

<!-- Statistik Dashboard -->
<div class="dashboard-stats">

    <!-- Total Menu -->
    <div class="coffee-card">
        <p class="text-muted mb-2">Total Menu</p>
        <h3 class="fw-bold">{{ $totalMenu }}</h3>
        <a href="{{ route('menu.index') }}">
            Lihat menu →
        </a>
    </div>

    <!-- Total Pelanggan -->
    <div class="coffee-card">
        <p class="text-muted mb-2">Total Pelanggan</p>
        <h3 class="fw-bold">{{ $totalPelanggan }}</h3>
        <a href="{{ route('pelanggan.index') }}">
            Lihat pelanggan →
        </a>
    </div>

    <!-- Total Pesanan -->
    <div class="coffee-card">
        <p class="text-muted mb-2">Total Pesanan</p>
        <h3 class="fw-bold">{{ $totalPesanan }}</h3>
        <a href="{{ route('pesanan.index') }}">
            Lihat pesanan →
        </a>
    </div>

    <!-- Total Pendapatan -->
    <div class="coffee-card">
        <p class="text-muted mb-2">Total Pendapatan</p>
        <h4 class="fw-bold">
            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
        </h4>
    </div>

    <!-- Total Item Terjual -->
    <div class="coffee-card">
        <p class="text-muted mb-2">Total Item Terjual</p>
        <h3 class="fw-bold">{{ $totalItemTerjual }}</h3>
        <span class="text-muted">
            Akumulasi seluruh item pesanan
        </span>
    </div>

</div>

<!-- Tabel Pesanan Terbaru -->
<div class="coffee-card">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Pesanan Terbaru</h5>

        <a href="{{ route('pesanan.index') }}"
           class="btn btn-coffee btn-sm">
            Lihat Semua
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pesananTerbaru as $pesanan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $pesanan->nama_pelanggan }}</td>

                        <td>{{ $pesanan->menu }}</td>

                        <td>{{ $pesanan->jumlah }}</td>

                        <td>
                            Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5"
                            class="text-center text-muted">
                            Belum ada pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
