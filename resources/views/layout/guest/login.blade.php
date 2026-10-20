<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Zura Coffee Space</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #FDFBF7; color: #4A3B32; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .login-card { background: #fff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 400px; text-align: center; }
        .login-card h2 { margin-bottom: 8px; color: #362921; }
        .login-card p { font-size: 14px; color: #806B5D; margin-bottom: 20px; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; text-align: left; }
        .form-group { margin-bottom: 15px; text-align: left; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; }
        .btn-submit { background-color: #806B5D; color: white; padding: 12px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; width: 100%; margin-top: 10px; font-size: 15px; }
        .btn-submit:hover { background-color: #6E5A4D; }
        .back-link { display: inline-block; margin-top: 15px; color: #806B5D; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Login Admin</h2>
        <p>Masukan kredensial untuk mengakses dashboard</p>

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <a href="{{ route('guest.home') }}" class="back-link">← Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
