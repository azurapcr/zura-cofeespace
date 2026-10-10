
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu | Zura Coffee Space</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #F7F1E9;
            color: #3B261E;
        }

        .sidebar {
            width: 230px;
            min-height: 100vh;
            background: #3B261E;
            padding: 28px 18px;
            position: fixed;
            color: white;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            padding: 13px;
            margin-bottom: 8px;
            color: #F7F1E9;
            text-decoration: none;
            border-radius: 7px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #6F4935;
        }

        .main {
            margin-left: 230px;
            padding: 35px;
        }

        .topbar {
            margin-bottom: 28px;
        }

        .topbar h1 {
            margin-bottom: 8px;
        }

        .topbar p {
            color: #806C60;
        }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #3B261E0D;
            overflow-x: auto;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-add {
            background: #6F4935;
            color: white;
        }

        .btn-edit {
            background: #C69A6B;
            color: #3B261E;
        }

        .btn-delete {
            background: #8C3B32;
            color: white;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #EEE5DC;
        }

        th {
            background: #F7F1E9;
            color: #6F4935;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            display: inline;
        }

        .empty {
            text-align: center;
            color: #806C60;
            padding: 25px;
        }

        .alert {
            background: #E4F3E5;
            color: #245A2A;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">☕ Zura Coffee Space</div>

        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('menu.index') }}" class="active">☕ Data Menu</a>
        <a href="{{ route('pelanggan.index') }}">👥 Data Pelanggan</a>
        <a href="{{ route('pesanan.index') }}">🧾 Data Pesanan</a>
        <a href="{{ route('guest.home') }}">🌐 Halaman Guest</a>
    </aside>

    <main class="main">
        <header class="topbar">
            <h1>Data Menu ☕</h1>
            <p>Kelola menu dan harga produk Zura Coffee Space.</p>
        </header>

        <section class="panel">
            <div class="panel-header">
                <h2>Daftar Menu</h2>

                <a href="{{ route('menu.create') }}" class="btn btn-add">
                    + Tambah Menu
                </a>
            </div>

            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($menu as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('menu.edit', $item->id) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('menu.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada data menu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>
