<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Pemesanan - Zura Coffee Space</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f1e8;
            color: #39251d;
        }

        nav {
            background: #3b261e;
            color: white;
            padding: 22px 8%;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 700px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 15px #00000012;
        }

        h1 {
            margin-top: 0;
        }

        .menu-info {
            background: #f7f1e9;
            border-left: 5px solid #8b5e3c;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .harga {
            font-weight: bold;
            color: #8b5e3c;
            font-size: 20px;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8c8b8;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
        }

        input:focus, textarea:focus {
            outline: 2px solid #c69a6b;
            border-color: #8b5e3c;
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 6px;
        }

        .total {
            margin-top: 22px;
            padding: 15px;
            background: #f7f1e9;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            width: 100%;
            margin-top: 22px;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #6b422e;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background: #3b261e;
        }

        .back {
            display: inline-block;
            margin-top: 18px;
            color: #6b422e;
            text-decoration: none;
        }

        .required-note {
            font-size: 13px;
            color: #76665b;
        }

        footer {
            background: #3b261e;
            color: white;
            padding: 22px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <nav>
        <strong>ZURA COFFEE SPACE</strong>
        <span style="float: right">
            <a href="{{ url('/') }}">Kembali ke Home</a>
        </span>
    </nav>

    <main class="container">
        <div class="form-card">
            <h1>Form Pemesanan</h1>
            <p class="required-note">
                Lengkapi data di bawah ini untuk memesan kopi favoritmu.
            </p>

            <div class="menu-info">
                <h2>{{ $menuDipilih->nama_menu }}</h2>

                <p>
                    Kategori: {{ $menuDipilih->kategori }}
                </p>

                <p class="harga">
                    Rp{{ number_format($menuDipilih->harga, 0, ',', '.') }}
                </p>
            </div>

            @if ($errors->any())
                <div class="error">
                    <strong>Periksa kembali data kamu:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guest.order.store') }}" method="POST">
                @csrf

                <input
                    type="hidden"
                    name="menu_id"
                    value="{{ $menuDipilih->id }}"
                >

                <label for="nama">Nama Lengkap</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="no_hp">Nomor HP</label>
                <input
                    type="tel"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Contoh: 081234567890"
                    required
                >
                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="alamat">Alamat</label>
                <textarea
                    id="alamat"
                    name="alamat"
                    rows="3"
                    placeholder="Masukkan alamat kamu"
                    required
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="jumlah">Jumlah Pesanan</label>
                <input
                    type="number"
                    id="jumlah"
                    name="jumlah"
                    min="1"
                    value="{{ old('jumlah', 1) }}"
                    required
                >
                @error('jumlah')
                    <div class="error">{{ $message }}</div>
                @enderror

                <div class="total">
                    Total Harga:
                    <span id="totalHarga">
                        Rp{{ number_format($menuDipilih->harga, 0, ',', '.') }}
                    </span>
                </div>

                <button type="submit" class="btn">
                    Kirim Pesanan
                </button>
            </form>

            <a href="{{ url('/#menu') }}" class="back">
                &larr; Kembali ke daftar menu
            </a>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Zura Coffee Space
    </footer>

    <script>
        const hargaSatuan = {{ $menuDipilih->harga }};
        const inputJumlah = document.getElementById('jumlah');
        const totalHarga = document.getElementById('totalHarga');

        function hitungTotal() {
            const jumlah = Math.max(1, parseInt(inputJumlah.value) || 1);
            const total = hargaSatuan * jumlah;

            totalHarga.textContent = 'Rp' +
                total.toLocaleString('id-ID');
        }

        inputJumlah.addEventListener('input', hitungTotal);
        hitungTotal();
    </script>
</body>
</html>
