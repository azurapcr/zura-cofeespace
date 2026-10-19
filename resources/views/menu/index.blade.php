
@extends('layouts.admin')

@section('title', 'Data Menu |Coffee Space')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="page-title mb-1">
            <i class="bi bi-cup-hot me-2"></i>Data Menu
        </h2>
        <p class="text-muted mb-0">Kelola daftar minuman dan makanan.</p>
    </div>

    <a href="{{ route('menu.create') }}" class="btn btn-coffee">
        <i class="bi bi-plus-lg me-1"></i>Tambah Menu
    </a>
</div>


<div class="coffee-card">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <h5 class="fw-bold mb-3">Daftar Menu</h5>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse(($menus ?? $menu ?? collect()) as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_menu }}</td>
                        <td>Rp{{ number_format((float) $item->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge text-bg-light">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('menu.edit', $item->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('menu.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus menu ini?')">
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
                        <td colspan="5" class="text-center text-muted py-4">
                            Belum ada data menu.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
