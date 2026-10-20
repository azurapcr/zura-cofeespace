<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Zura Coffee Space</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #FDFBF7; color: #4A3B32; line-height: 1.6; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 20px 8%; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100; }
        nav .logo { font-size: 22px; font-weight: bold; color: #4A3B32; text-decoration: none; }
        nav div a { margin-left: 20px; text-decoration: none; color: #6E5A4D; font-weight: 500; transition: 0.3s; }
        nav div a:hover { color: #806B5D; }
        .hero { display: flex; align-items: center; justify-content: center; text-align: center; padding: 100px 20px; background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=1200') center/cover; }
        .hero-content { max-width: 700px; }
        .eyebrow { font-size: 14px; text-transform: uppercase; letter-spacing: 2px; color: #806B5D; font-weight: bold; margin-bottom: 10px; }
        .hero h1 { font-size: 42px; margin-bottom: 15px; color: #362921; }
        .hero p { font-size: 18px; color: #6E5A4D; margin-bottom: 25px; }
        .button { display: inline-block; padding: 12px 28px; background: #806B5D; color: #fff; text-decoration: none; border-radius: 30px; font-weight: bold; transition: 0.3s; }
        .button:hover { background: #6E5A4D; }
        .section { padding: 60px 8%; text-align: center; }
        .section-heading span { color: #806B5D; font-weight: bold; text-transform: uppercase; font-size: 13px; }
        .section-heading h2 { font-size: 32px; margin: 5px 0 10px; }
        .section-heading p { color: #6E5A4D; margin-bottom: 40px; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; }
        .menu-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: left; }
        .menu-cover { font-size: 40px; text-align: center; margin-bottom: 15px; background: #F7F3EE; padding: 20px; border-radius: 8px; }
        .category { font-size: 12px; text-transform: uppercase; color: #806B5D; font-weight: bold; }
        .menu-info h3 { font-size: 20px; margin: 5px 0; }
        .price { font-size: 16px; font-weight: bold; color: #362921; margin-top: 10px; }
        .empty { grid-column: 1 / -1; padding: 40px; background: #fff; border-radius: 12px; }
        .about { background: #EFEBE4; text-align: center; padding: 60px 20px; margin-top: 40px; }
        .about h2 { font-size: 28px; margin-bottom: 15px; }
        .about p { max-width: 600px; margin: 0 auto; color: #6E5A4D; }
        footer { text-align: center; padding: 20px; background: #fff; color: #806B5D; font-size: 14px; border-top: 1px solid #eee; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <a href="{{ route('guest.home') }}" class="logo">Zura Coffee Space</a>
        <div>
            <a href="#home">Home</a>
            <a href="#menu">Our Menu</a>
            <a href="#about">About</a>
            <a href="{{ route('guest.contact') }}">Contact Us</a>
            <a href="{{ route('login') }}">Admin</a>
        </div>
    </nav>

    <!-- Hero Section -->
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

    <!-- Menu Section -->
    <section class="section" id="menu">
        <div class="section-heading">
            <span>Made with Love</span>
            <h2>Our Favorite Menu</h2>
            <p>Pilihan menu yang siap menemani waktu santai kamu.</p>
        </div>

        <div class="menu-grid">
            @forelse ($menus ?? [] as $item)
                <article class="menu-card">
                    <div class="menu-cover">☕</div>
                    <div class="menu-info">
                        <span class="category">{{ $item->kategori }}</span>
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

    <!-- About Section -->
    <section class="about" id="about">
        <h2>A Little Space, A Lot of Comfort.</h2>
        <p>
            Zura Coffee Space hadir untuk menemani hari-harimu dengan
            pilihan menu yang nikmat dan suasana yang hangat.
            Karena terkadang, secangkir kopi adalah awal dari cerita terbaik.
        </p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Zura Coffee Space. All rights reserved.</p>
    </footer>

</body>
</html>
