@extends('layouts.admin')

@section('title', 'Edit Pelanggan | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-pencil-square me-2"></i>Edit Pelanggan
    </h2>
    <p class="text-muted">Perbarui informasi pelanggan.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
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
            <label class="form-label fw-semibold" for="nama">Nama Pelanggan *</label>
            <input class="form-control" id="nama" name="nama"
                   value="{{ old('nama', $pelanggan->nama) }}" required>
            @error('nama')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="no_hp">Nomor HP *</label>
            <input class="form-control" id="no_hp" name="no_hp"
                   value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
            @error('no_hp')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="alamat">Alamat *</label>
            <textarea class="form-control" id="alamat" name="alamat"
                      rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            @error('alamat')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
        </button>

        <a href="{{ route('pelanggan.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
