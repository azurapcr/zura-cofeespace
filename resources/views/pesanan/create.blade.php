
@extends('layouts.admin')

@section('title', 'Tambah Pesanan | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-receipt-cutoff me-2"></i>Tambah Pesanan
    </h2>
    <p class="text-muted">Catat pesanan baru dari pelanggan.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @foreach ([
            'nama_pelanggan' => ['Nama Pelanggan', 'text', ''],
            'menu' => ['Nama Menu', 'text', ''],
            'jumlah' => ['Jumlah', 'number', 1],
            'total_harga' => ['Total Harga (Rp)', 'number', ''],
        ] as $field => [$label, $type, $default])
            <div class="mb-3">
                <label class="form-label fw-semibold" for="{{ $field }}">
                    {{ $label }} *
                </label>
                <input class="form-control" type="{{ $type }}"
                       id="{{ $field }}" name="{{ $field }}"
                       value="{{ old($field, $default) }}"
                       @if ($field === 'jumlah') min="1"
                       @elseif ($field === 'total_harga') min="0" step="0.01"
                       @endif required>
                @error($field)
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Pesanan
        </button>
        <a href="{{ route('pesanan.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
