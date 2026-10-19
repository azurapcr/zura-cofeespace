
@extends('layouts.admin')

@section('title', 'Edit Menu | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-pencil-square me-2"></i>Edit Menu
    </h2>
    <p class="text-muted">Perbarui informasi menu.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
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
            <label class="form-label fw-semibold" for="nama_menu">Nama Menu *</label>
            <input class="form-control" id="nama_menu" name="nama_menu"
                   value="{{ old('nama_menu', $menu->nama_menu) }}" required>
            @error('nama_menu')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="harga">Harga (Rp) *</label>
            <input class="form-control" type="number" id="harga" name="harga"
                   min="0" step="0.01"
                   value="{{ old('harga', $menu->harga) }}" required>
            @error('harga')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="kategori">Kategori *</label>
            <input class="form-control" id="kategori" name="kategori"
                   value="{{ old('kategori', $menu->kategori) }}" required>
            @error('kategori')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
        </button>

        <a href="{{ route('menu.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
