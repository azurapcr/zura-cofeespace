<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan | Zura Coffee Space</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 16px;
            font-family: Arial, sans-serif;
            background: #F7F1E9;
            color: #3B261E;
        }

        .container {
            max-width: 650px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px #3b261e15;
        }

        h2 {
            margin-top: 0;
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

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D8C7B8;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input:focus, textarea:focus {
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
            font-size: 14px;
            text-decoration: none;
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
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>👤 Edit Pelanggan</h2>
        <p>Perbarui informasi pelanggan Zura Coffee Space.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Periksa kembali data:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama">Nama Pelanggan</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama', $pelanggan->nama) }}"
                required
            >

            <label for="no_hp">Nomor HP</label>
            <input
                type="text"
                id="no_hp"
                name="no_hp"
                value="{{ old('no_hp', $pelanggan->no_hp) }}"
                required
            >

            <label for="alamat">Alamat</label>
            <textarea
                id="alamat"
                name="alamat"
                required
            >{{ old('alamat', $pelanggan->alamat) }}</textarea>

            <div class="buttons">
                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('pelanggan.index') }}" class="back">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>
```
