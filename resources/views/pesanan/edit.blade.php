
@extends('layouts.admin')

@section('title', 'Edit Pesanan |Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-pencil-square me-2"></i>Edit Pesanan
    </h2>
    <p class="text-muted">Perbarui informasi pesanan.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label fw-semibold" for="nama_pelanggan">
                Nama Pelanggan *
            </label>
            <input class="form-control" id="nama_pelanggan"
                   name="nama_pelanggan"
                   value="{{ old('nama_pelanggan', $pesanan->nama_pelanggan) }}"
                   required>
            @error('nama_pelanggan')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="menu">Nama Menu *</label>
            <input class="form-control" id="menu" name="menu"
                   value="{{ old('menu', $pesanan->menu) }}" required>
            @error('menu')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="jumlah">Jumlah *</label>
            <input class="form-control" type="number" id="jumlah"
                   name="jumlah" min="1"
                   value="{{ old('jumlah', $pesanan->jumlah) }}" required>
            @error('jumlah')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="total_harga">
                Total Harga (Rp) *
            </label>
            <input class="form-control" type="number" id="total_harga"
                   name="total_harga" min="0" step="0.01"
                   value="{{ old('total_harga', $pesanan->total_harga) }}"
                   required>
            @error('total_harga')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
        </button>

        <a href="{{ route('pesanan.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
