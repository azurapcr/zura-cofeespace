
@extends('layouts.admin')

@section('title', 'Tambah User | Coffee Space')

@section('content')
<div class="mb-4">
    <h2 class="page-title">Tambah User</h2>
    <p class="text-muted">Masukkan informasi user baru.</p>
</div>

<div class="coffee-card">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input class="form-control" id="name" name="name"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password *</label>
            <input type="password" class="form-control" id="password"
                   name="password" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Confirm Password *
            </label>
            <input type="password" class="form-control"
                   id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-coffee">Simpan</button>
        <a href="{{ route('users.index') }}" class="btn btn-light border">Batal</a>
    </form>
</div>
@endsection
