@extends('layouts.admin')

@section('title', 'Data Pesanan | Coffee Space')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="page-title mb-1">
            <i class="bi bi-receipt me-2"></i>Data Pesanan
        </h2>
        <p class="text-muted mb-0">Kelola transaksi pelanggan.</p>
    </div>

    <a href="{{ route('pesanan.create') }}" class="btn btn-coffee">
        <i class="bi bi-plus-lg me-1"></i>Tambah Pesanan
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="coffee-card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Pesanan</h5>
        <span class="badge text-bg-light">
            Total: {{ $pesanan->count() }} pesanan
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pesanan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->menu }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp{{ number_format((float) $item->total_harga, 0, ',', '.') }}</td>
                        <td class="text-end">
                            <a href="{{ route('pesanan.edit', $item->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('pesanan.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus pesanan ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data pesanan.
                            <div class="mt-2">
                                <a href="{{ route('pesanan.create') }}"
                                   class="btn btn-sm btn-coffee">
                                    Tambah Pesanan
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
```
