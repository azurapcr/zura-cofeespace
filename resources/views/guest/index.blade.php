<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Space</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f1e8;
            color: #39251d;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 8%;
            background: #3b261e;
            color: white;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .hero {
            padding: 90px 8%;
            background: linear-gradient(120deg, #ead6bf, #f8f1e8);
        }

        .hero h1 {
            font-size: 48px;
            max-width: 600px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            max-width: 550px;
        }

        section { padding: 45px 8%; }

        .btn {
            display: inline-block;
            background: #6b422e;
            color: white;
            padding: 13px 22px;
            border-radius: 7px;
            text-decoration: none;
            margin-top: 12px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover { background: #3b261e; }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000010;
        }

        .card h3 { margin-top: 0; }

        .price {
            color: #8b5e3c;
            font-size: 20px;
            font-weight: bold;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 18px;
        }

        .quantity button {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 7px;
            background: #ead6bf;
            color: #39251d;
            font-size: 22px;
            cursor: pointer;
        }

        .quantity input {
            width: 48px;
            text-align: center;
            border: 1px solid #d8c8b8;
            border-radius: 6px;
            padding: 9px 3px;
            font-size: 16px;
        }

        .alert {
            margin: 25px 8% 0;
            padding: 15px 20px;
            border-radius: 8px;
            background: #d8f3dc;
            color: #1b4332;
        }

        .alert-error {
            background: #fde8e7;
            color: #912018;
        }

        .checkout-bar {
            margin-top: 28px;
            padding: 22px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000010;
        }

        .checkout-bar p { line-height: 1.6; }

        footer {
            background: #3b261e;
            color: white;
            padding: 25px;
            text-align: center;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a { margin: 0 8px; }
            .hero h1 { font-size: 35px; }
        }
    </style>
</head>

<body>
    <nav>
        <strong>ZURA COFFEE SPACE</strong>
        <div>
            <a href="{{ url('/') }}">Home</a>
            <a href="#menu">Menu</a>
            <a href="#tentang">Tentang</a>
        </div>
    </nav>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if ($errors->has('keranjang'))
        <div class="alert alert-error">
            {{ $errors->first('keranjang') }}
        </div>
    @endif

    <main>
        <div class="hero">
            <h1>Temukan Kopi Favoritmu</h1>
            <p>
                Nikmati aroma kopi, suasana nyaman, dan waktu terbaik
                untuk beristirahat di Zura Coffee Space.
            </p>
            <a class="btn" href="#menu">Lihat Menu</a>
        </div>

        <section id="tentang">
            <h2>Selamat Datang di Zura Coffee Space</h2>
            <p>
                Tempat sederhana untuk menikmati kopi dan berbagi cerita.
                Pilih kopi favoritmu, atur jumlahnya, lalu lanjutkan pemesanan.
            </p>
        </section>

        <section id="menu">
            <h2>Menu Pilihan</h2>
            <p>Pilih satu atau beberapa menu sekaligus.</p>

            <form action="{{ route('guest.cart.store') }}" method="POST">
                @csrf

                <div class="cards">
                    @forelse ($menus as $menu)
                        <div class="card">
                            <h3>{{ $menu->nama_menu }}</h3>

                            <p>
                                {{ $menu->kategori ?? 'Menu kopi pilihan Zura Coffee Space.' }}
                            </p>

                            <p class="price">
                                Rp{{ number_format($menu->harga, 0, ',', '.') }}
                            </p>

                            <div class="quantity">
                                <button
                                    type="button"
                                    onclick="ubahJumlah({{ $menu->id }}, -1)"
                                    aria-label="Kurangi {{ $menu->nama_menu }}"
                                >−</button>

                                <input
                                    type="number"
                                    id="jumlah-{{ $menu->id }}"
                                    name="jumlah[{{ $menu->id }}]"
                                    value="0"
                                    min="0"
                                    max="99"
                                    readonly
                                    data-harga="{{ $menu->harga }}"
                                    aria-label="Jumlah {{ $menu->nama_menu }}"
                                >

                                <button
                                    type="button"
                                    onclick="ubahJumlah({{ $menu->id }}, 1)"
                                    aria-label="Tambah {{ $menu->nama_menu }}"
                                >+</button>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada menu yang tersedia di database.</p>
                    @endforelse
                </div>

                @if ($menus->isNotEmpty())
                    <div class="checkout-bar">
                        <h3>Keranjang Pesanan</h3>

                        <p>
                            Jumlah item:
                            <strong id="jumlahItem">0</strong>
                        </p>

                        <p>
                            Total sementara:
                            <strong id="totalHarga">Rp0</strong>
                        </p>

                        <button class="btn" type="submit">
                            Lanjut ke Pemesanan
                        </button>
                    </div>
                @endif
            </form>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} Zura Coffee Space
    </footer>

    <script>
        function ubahJumlah(id, perubahan) {
            const input = document.getElementById('jumlah-' + id);
            if (!input) return;

            let jumlah = parseInt(input.value, 10) || 0;
            jumlah = Math.max(0, Math.min(99, jumlah + perubahan));

            input.value = jumlah;
            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;
            let jumlahItem = 0;

            document.querySelectorAll('.quantity input').forEach(function(input) {
                const jumlah = parseInt(input.value, 10) || 0;
                const harga = parseFloat(input.dataset.harga) || 0;

                total += jumlah * harga;
                jumlahItem += jumlah;
            });

            document.getElementById('jumlahItem').textContent = jumlahItem;
            document.getElementById('totalHarga').textContent =
                'Rp' + total.toLocaleString('id-ID');
        }

        hitungTotal();
    </script>
</body>
</html>

