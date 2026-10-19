@extends('layouts.admin')

@section('title', 'Dashboard |Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">Selamat datang di sistem manajemen Coffee Space.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="coffee-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-muted mb-2">Total Menu</p>
                    <h3 class="fw-bold">{{ $totalMenu }}</h3>
                </div>
                <i class="bi bi-cup-hot fs-2"></i>
            </div>
            <a href="{{ route('menu.index') }}">Lihat menu →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="coffee-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-muted mb-2">Total Pelanggan</p>
                    <h3 class="fw-bold">{{ $totalPelanggan }}</h3>
                </div>
                <i class="bi bi-people fs-2"></i>
            </div>
            <a href="{{ route('pelanggan.index') }}">Lihat pelanggan →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="coffee-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-muted mb-2">Total Pesanan</p>
                    <h3 class="fw-bold">{{ $totalPesanan }}</h3>
                </div>
                <i class="bi bi-receipt fs-2"></i>
            </div>
            <a href="{{ route('pesanan.index') }}">Lihat pesanan →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="coffee-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-muted mb-2">Total Pendapatan</p>
                    <h4 class="fw-bold">
                        Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h4>
                </div>
                <i class="bi bi-wallet2 fs-2"></i>
            </div>
            <span class="text-muted">Dari data pesanan</span>
        </div>
    </div>
</div>

<div class="coffee-card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Pesanan Terbaru</h5>
        <a href="{{ route('pesanan.index') }}" class="btn btn-coffee btn-sm">
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
                @forelse($pesananTerbaru as $pesanan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pesanan->nama_pelanggan }}</td>
                        <td>{{ $pesanan->menu }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
