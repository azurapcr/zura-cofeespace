
@extends('layouts.admin')

@section('title', 'Data User | Coffee Space')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="page-title mb-1">
            <i class="bi bi-people me-2"></i>Data User
        </h2>
        <p class="text-muted mb-0">Kelola informasi pengguna Coffee Space.</p>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-coffee">
        <i class="bi bi-plus-lg me-1"></i>Tambah User
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="coffee-card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar User</h5>
        <span class="badge text-bg-light">
            Total: {{ $user->count() }} user
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-end">
                            <a href="{{ route('users.edit', $item->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('users.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus user ini?')">
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
                        <td colspan="4" class="text-center text-muted py-4">
                            Belum ada data user.
                            <div class="mt-2">
                                <a href="{{ route('users.create') }}"
                                   class="btn btn-sm btn-coffee">
                                    Tambah User
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
