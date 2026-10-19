
@extends('layouts.admin')

@section('title', 'Edit User | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">
        <i class="bi bi-pencil-square me-2"></i>Edit User
    </h2>
    <p class="text-muted">Perbarui informasi user.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
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
            <label class="form-label fw-semibold" for="name">Name *</label>
            <input class="form-control" id="name" name="name"
                   value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="password">
                Password Baru
            </label>
            <input type="password" class="form-control" id="password"
                   name="password" placeholder="Kosongkan jika tidak diubah">
            @error('password')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="password_confirmation">
                Confirm Password
            </label>
            <input type="password" class="form-control"
                   id="password_confirmation"
                   name="password_confirmation"
                   placeholder="Ulangi password baru">
        </div>

        <button type="submit" class="btn btn-coffee">
            <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
        </button>

        <a href="{{ route('users.index') }}" class="btn btn-light border">
            Batal
        </a>
    </form>
</div>
@endsection
