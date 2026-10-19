
@extends('layouts.admin')

@section('title', 'Tambah Menu | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-plus-circle me-2"></i>Tambah Menu
    </h2>
    <p class="text-muted">Tambahkan menu baru ke dalam daftar.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @foreach ([
            'nama_menu' => ['Nama Menu', 'text', 'Contoh: Es Kopi Susu'],
            'harga' => ['Harga (Rp)', 'number', 'Contoh: 18000'],
            'kategori' => ['Kategori', 'text', 'Contoh: Coffee'],
        ] as $field => [$label, $type, $placeholder])
            <div class="mb-3">
                <label class="form-label fw-semibold" for="{{ $field }}">
                    {{ $label }} *
                </label>
                <input class="form-control" type="{{ $type }}"
                       id="{{ $field }}" name="{{ $field }}"
                       value="{{ old($field) }}"
                       placeholder="{{ $placeholder }}"
                       @if ($field === 'harga') min="0" step="0.01" @endif
                       required>
                @error($field)
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Menu
        </button>
        <a href="{{ route('menu.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
