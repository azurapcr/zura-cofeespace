<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Zura Coffee Space</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #FDFBF7; color: #4A3B32; line-height: 1.6; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 20px 8%; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100; }
        nav .logo { font-size: 22px; font-weight: bold; color: #4A3B32; text-decoration: none; }
        nav div a { margin-left: 20px; text-decoration: none; color: #6E5A4D; font-weight: 500; transition: 0.3s; }
        nav div a:hover { color: #806B5D; }
        .container { display: flex; justify-content: center; align-items: center; min-height: 80vh; padding: 40px 20px; }
        .card-form { background: #fff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 500px; }
        .card-form h2 { color: #362921; margin-bottom: 8px; }
        .card-form p { color: #806B5D; font-size: 14px; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; text-align: left; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; color: #4A3B32; font-size: 14px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; }
        .btn-submit { background-color: #806B5D; color: white; padding: 12px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; width: 100%; margin-top: 10px; font-size: 15px; transition: 0.3s; }
        .btn-submit:hover { background-color: #6E5A4D; }
        footer { text-align: center; padding: 20px; background: #fff; color: #806B5D; font-size: 14px; border-top: 1px solid #eee; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <a href="{{ route('guest.home') }}" class="logo">Zura Coffee Space</a>
        <div>
            <a href="{{ route('guest.home') }}#home">Home</a>
            <a href="{{ route('guest.home') }}#menu">Our Menu</a>
            <a href="{{ route('guest.home') }}#about">About</a>
            <a href="{{ route('guest.contact') }}">Contact Us</a>
            <a href="{{ route('login') }}">Admin</a>
        </div>
    </nav>

    <!-- Content Contact -->
    <div class="container">
        <div class="card-form">
            <h2>Hubungi Kami</h2>
            <p>Punya pertanyaan, saran, atau ingin reservasi tempat? Kirimkan pesanmu di bawah ini.</p>

            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
                </div>

                <div class="form-group">
                    <label for="email">Email / No. WhatsApp</label>
                    <input type="text" id="email" name="email" required placeholder="Masukkan email atau kontak">
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="4" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>

                <button type="button" class="btn-submit">Kirim Pesan</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Zura Coffee Space. All rights reserved.</p>
    </footer>

</body>
</html>
