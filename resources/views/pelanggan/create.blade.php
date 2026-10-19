
@extends('layouts.admin')

@section('title', 'Tambah Pelanggan | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-person-plus me-2"></i>Tambah Pelanggan
    </h2>
    <p class="text-muted">Masukkan informasi pelanggan baru.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @foreach ([
            'nama' => ['Nama Pelanggan', 'Nama lengkap'],
            'no_hp' => ['Nomor HP', '08xxxxxxxxxx'],
        ] as $field => [$label, $placeholder])
            <div class="mb-3">
                <label class="form-label fw-semibold" for="{{ $field }}">
                    {{ $label }} *
                </label>
                <input class="form-control" id="{{ $field }}"
                       name="{{ $field }}" value="{{ old($field) }}"
                       placeholder="{{ $placeholder }}" required>
                @error($field)
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <div class="mb-4">
            <label class="form-label fw-semibold" for="alamat">Alamat *</label>
            <textarea class="form-control" id="alamat" name="alamat"
                      rows="3" placeholder="Alamat pelanggan"
                      required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Pelanggan
        </button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
