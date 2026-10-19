<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Coffee Space</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f8f1e8;
            color: #39251d;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 15px #00000012;
        }

        h1, h2 { color: #3b261e; }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee0d2;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            margin: 22px 0;
        }

        label {
            display: block;
            margin: 16px 0 7px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8c8b8;
            border-radius: 7px;
            font: inherit;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 13px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 7px;
            background: #6b422e;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover { background: #3b261e; }

        .error {
            color: #b42318;
            font-size: 14px;
            margin-top: 5px;
        }

        .back {
            color: #6b422e;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="back" href="{{ route('guest.home') }}">
            &larr; Kembali ke menu
        </a>

        <h1>Checkout Pesanan</h1>
        <p>Periksa pesananmu sebelum mengirimkannya.</p>

        <h2>Ringkasan Pesanan</h2>

        @foreach ($keranjang as $item)
            <div class="item">
                <div>
                    <strong>{{ $item['nama_menu'] }}</strong><br>
                    {{ $item['jumlah'] }} ×
                    Rp{{ number_format($item['harga'], 0, ',', '.') }}
                </div>

                <strong>
                    Rp{{ number_format($item['subtotal'], 0, ',', '.') }}
                </strong>
            </div>
        @endforeach

        <div class="total">
            Total:
            Rp{{ number_format($totalHarga, 0, ',', '.') }}
        </div>

        <h2>Data Pemesan</h2>

        <form action="{{ route('guest.checkout.store') }}" method="POST">
            @csrf

            <label for="nama">Nama Lengkap</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama') }}"
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
                required
            >
            @error('no_hp')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="alamat">Alamat</label>
            <textarea
                id="alamat"
                name="alamat"
                required
            >{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn">
                Konfirmasi Pesanan
            </button>
        </form>
    </div>
</body>
</html>

