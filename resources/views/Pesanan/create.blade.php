```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan | Zura Coffee Space</title>

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

        .container {
            max-width: 650px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px #3b261e15;
        }

        h2 {
            margin-top: 0;
            color: #3B261E;
        }

        p {
            color: #806B5D;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #D8C7B8;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: 2px solid #C69A6B;
            border-color: transparent;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button, .back {
            border: none;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        button {
            background: #6F4935;
            color: white;
        }

        button:hover {
            background: #3B261E;
        }

        .back {
            background: #E9DED3;
            color: #3B261E;
        }

        .error {
            color: #B42318;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>☕ Tambah Pesanan</h2>
        <p>Masukkan informasi pesanan pelanggan di bawah ini.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf

            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input
                type="text"
                id="nama_pelanggan"
                name="nama_pelanggan"
                value="{{ old('nama_pelanggan') }}"
                required
            >

            <label for="menu">Nama Menu</label>
            <input
                type="text"
                id="menu"
                name="menu"
                value="{{ old('menu') }}"
                required
            >

            <label for="jumlah">Jumlah Pesanan</label>
            <input
                type="number"
                id="jumlah"
                name="jumlah"
                min="1"
                value="{{ old('jumlah', 1) }}"
                required
            >

            <label for="total_harga">Total Harga (Rp)</label>
            <input
                type="number"
                id="total_harga"
                name="total_harga"
                min="0"
                value="{{ old('total_harga') }}"
                required
            >

            <div class="buttons">
                <button type="submit">Simpan Pesanan</button>
                <a href="{{ route('pesanan.index') }}" class="back">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>
```
