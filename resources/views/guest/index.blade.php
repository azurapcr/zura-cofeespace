<<<<<<< HEAD
=======
```blade
>>>>>>> 54f22e0be8074bf1db39164963a053edd21d8cf9
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Coffee Space</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f1e8;
            color: #39251d;
=======
    <title>Zura Coffee Space | Coffee & Comfort</title>

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
>>>>>>> 54f22e0be8074bf1db39164963a053edd21d8cf9
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
<<<<<<< HEAD
            padding: 22px 8%;
            background: #3b261e;
            color: white;
        }

=======
            flex-wrap: wrap;
            gap: 15px;
            padding: 22px 7%;
            background: #3B261E;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

>>>>>>> 54f22e0be8074bf1db39164963a053edd21d8cf9
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
<<<<<<< HEAD
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
=======
            font-size: 14px;
        }

        nav a:hover {
            color: #C69A6B;
        }

        .hero {
            min-height: 420px;
            padding: 80px 7%;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, #3B261E 0%, #3B261EED 45%, #3B261E66 100%),
                url('https://images.unsplash.com/photo-1445116572660-236099ec97a0?auto=format&fit=crop&w=1600&q=85');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero-content {
            max-width: 600px;
        }

        .eyebrow {
            color: #D9B58B;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(38px, 6vw, 62px);
            line-height: 1.12;
            margin-bottom: 20px;
        }

        .hero p {
            color: #F0E4D8;
            line-height: 1.8;
            max-width: 480px;
            margin-bottom: 28px;
        }

        .button {
            display: inline-block;
            padding: 13px 22px;
            background: #C69A6B;
            color: #3B261E;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background: #E0BC93;
        }

        .section {
            padding: 65px 7%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading span {
            color: #9A704D;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .section-heading h2 {
            font-family: Georgia, serif;
            font-size: 34px;
            margin-top: 12px;
        }

        .section-heading p {
            color: #806B5D;
            margin-top: 12px;
            line-height: 1.6;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .menu-card {
            overflow: hidden;
            background: white;
            border-radius: 14px;
            border: 1px solid #E9DED3;
            transition: transform .2s, box-shadow .2s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px #3b261e18;
        }

        .menu-cover {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #E9D7C4, #C69A6B);
            font-size: 55px;
        }

        .menu-info {
            padding: 22px;
        }

        .category {
            display: inline-block;
            padding: 6px 10px;
            background: #F7F1E9;
            color: #806B5D;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .menu-info h3 {
            font-family: Georgia, serif;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .price {
            font-weight: bold;
            color: #8A5A3B;
            font-size: 18px;
        }

        .empty {
            grid-column: 1 / -1;
            padding: 35px;
            background: white;
            border-radius: 12px;
            text-align: center;
            color: #806B5D;
        }

        .about {
            background: #E9DED3;
            text-align: center;
            padding: 55px 7%;
        }

        .about h2 {
            font-family: Georgia, serif;
            font-size: 30px;
            margin-bottom: 15px;
        }

        .about p {
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.8;
            color: #6F4935;
        }

        footer {
            padding: 25px 7%;
            text-align: center;
            background: #3B261E;
            color: #E9DED3;
            font-size: 13px;
            line-height: 1.8;
        }

        @media (max-width: 800px) {
            .menu-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            nav a {
                margin-left: 10px;
            }
        }

        @media (max-width: 520px) {
            nav {
                padding: 20px 5%;
            }

            nav a {
                margin-left: 0;
                margin-right: 12px;
            }

            .hero {
                padding: 65px 6%;
                min-height: 380px;
            }

            .section {
                padding: 45px 5%;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
>>>>>>> 54f22e0be8074bf1db39164963a053edd21d8cf9
        }
    </style>
</head>

<body>
<<<<<<< HEAD
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

=======

    <nav>
        <div class="logo">☕ Zura Coffee Space</div>

        <div>
            <a href="#home">Home</a>
            <a href="#menu">Our Menu</a>
            <a href="#about">About</a>
            <a href="{{ route('dashboard') }}">Admin</a>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="hero-content">
            <div class="eyebrow">Welcome to Zura Coffee Space</div>

            <h1>Your Daily Dose of Coffee & Comfort.</h1>

            <p>
                Temukan kopi favoritmu, nikmati suasana yang hangat,
                dan jadikan setiap tegukan sebagai bagian dari cerita harimu.
            </p>

            <a href="#menu" class="button">Explore Our Menu →</a>
        </div>
    </section>

    <section class="section" id="menu">
        <div class="section-heading">
            <span>Made with Love</span>
            <h2>Our Favorite Menu</h2>
            <p>Pilihan menu yang siap menemani waktu santai kamu.</p>
        </div>

        <div class="menu-grid">
            @forelse ($menus as $item)
                <article class="menu-card">
                    <div class="menu-cover">☕</div>

                    <div class="menu-info">
                        <span class="category">
                            {{ $item->kategori }}
                        </span>

                        <h3>{{ $item->nama_menu }}</h3>

                        <div class="price">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty">
                    <h3>Menu kami sedang disiapkan ☕</h3>
                    <p>Silakan cek kembali nanti, ya!</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="about" id="about">
        <h2>A Little Space, A Lot of Comfort.</h2>
        <p>
            Zura Coffee Space hadir untuk menemani hari-harimu dengan
            pilihan menu yang nikmat dan suasana yang hangat.
            Karena terkadang, secangkir kopi adalah awal dari cerita terbaik.
        </p>
    </section>

    <footer>
        © {{ date('Y') }} Zura Coffee Space. Made with ☕ and love.
    </footer>

</body>
</html>
```
>>>>>>> 54f22e0be8074bf1db39164963a053edd21d8cf9
