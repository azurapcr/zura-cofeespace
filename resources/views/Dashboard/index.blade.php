```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Zura Coffee Space</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F7F1E9;
            color: #3B261E;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: #3B261E;
            color: white;
            padding: 28px 20px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #D8C7B8;
            font-size: 12px;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            padding: 13px;
            margin: 8px 0;
            border-radius: 8px;
            color: #F7F1E9;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #6F4935;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .description {
            color: #806B5D;
            margin: 0;
        }

        .date {
            background: white;
            padding: 12px 16px;
            border-radius: 10px;
            color: #6F4935;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 15px #3b261e0d;
        }

        .card .icon {
            font-size: 26px;
            margin-bottom: 15px;
        }

        .card .label {
            color: #806B5D;
            font-size: 14px;
        }

        .card .number {
            font-size: 27px;
            font-weight: bold;
            margin-top: 10px;
            overflow-wrap: anywhere;
        }

        .section {
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 4px 15px #3b261e0d;
            overflow-x: auto;
        }

        .section h2 {
            margin: 0 0 20px;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #EEE5DC;
            text-align: left;
        }

        th {
            background: #F7F1E9;
            color: #6F4935;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            color: #806B5D;
            padding: 25px;
        }

        .guest-link {
            display: inline-block;
            margin-top: 22px;
            padding: 12px 16px;
            background: #6F4935;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .guest-link:hover {
            background: #3B261E;
        }

        @media (max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .main {
                padding: 20px 14px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">☕ Zura Coffee</div>
        <div class="subtitle">ADMIN PANEL</div>

        <a href="{{ route('dashboard') }}" class="active">
            🏠 Dashboard
        </a>

        <a href="{{ route('menu.index') }}">
            ☕ Data Menu
        </a>

        <a href="{{ route('pelanggan.index') }}">
            👥 Data Pelanggan
        </a>

        <a href="{{ route('pesanan.index') }}">
            🧾 Data Pesanan
        </a>

        <a href="{{ route('guest.home') }}">
            🌐 Halaman Pengunjung
        </a>
    </aside>

    <main class="main">
        <div class="topbar">
            <div>
                <h1>Dashboard Admin</h1>
                <p class="description">
                    Selamat datang di Zura Coffee Space.
                </p>
            </div>

            <div class="date">
                ☕ Admin Zura Coffee
            </div>
        </div>

        <div class="stats">
            <div class="card">
                <div class="icon">☕</div>
                <div class="label">Total Menu</div>
                <div class="number">
                    {{ $totalMenu }}
                </div>
            </div>

            <div class="card">
                <div class="icon">👥</div>
                <div class="label">Total Pelanggan</div>
                <div class="number">
                    {{ $totalPelanggan }}
                </div>
            </div>

            <div class="card">
                <div class="icon">🧾</div>
                <div class="label">Total Pesanan</div>
                <div class="number">
                    {{ $totalPesanan }}
                </div>
            </div>

            <div class="card">
                <div class="icon">💰</div>
                <div class="label">Total Pendapatan</div>
                <div class="number">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <section class="section">
            <h2>Pesanan Terbaru</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pesananTerbaru as $item)
                        <tr>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->menu }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                Belum ada pesanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('pesanan.index') }}" class="guest-link">
                Lihat Semua Pesanan →
            </a>
        </section>
    </main>

</div>
</body>
</html>
```
