
<link rel="stylesheet" href="{{ asset('spark-admin-1.0.0/assets/libs/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('spark-admin-1.0.0/assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('spark-admin-1.0.0/assets/css/main.css') }}">

<style>
    :root {
        --coffee-dark: #3B261E;
        --coffee-brown: #6F4935;
        --coffee-caramel: #C69A6B;
        --coffee-cream: #F7F1E9;
    }

    body {
        background: var(--coffee-cream);
    }

    /* Layout utama */
    .main-wrapper {
        min-height: 100vh;
        align-items: stretch;
    }

    .main-wrapper > .flex-grow-1 {
        min-width: 0;
    }

    .content-page {
        padding: 28px;
    }

    /* Sidebar */
    .sidebar-wrapper {
        background: var(--coffee-dark) !important;
        width: 260px;
        min-width: 260px;
        min-height: 100vh;
        flex-shrink: 0;
        color: #fff;
    }

    .sidebar-brand {
        color: #fff !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }

    .brand-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
        text-decoration: none;
        font-size: 21px;
        font-weight: 700;
    }

    .brand-icon {
        font-size: 27px;
    }

    .brand-subtitle {
        margin: 8px 0 0 37px;
        color: #D6B99F;
        font-size: 11px;
        letter-spacing: 2px;
    }

    .menu-label {
        display: block;
        padding: 10px 12px;
        margin-bottom: 8px;
        color: #C9B6A8;
        font-size: 11px;
        letter-spacing: 1px;
    }

    .sidebar-menu-link {
        display: flex !important;
        align-items: center;
        gap: 12px;
        margin-bottom: 6px;
        padding: 13px 14px !important;
        border-radius: 9px;
        color: #F7F1E9 !important;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .sidebar-menu-link i {
        font-size: 18px;
    }

    .sidebar-menu-link.active,
    .sidebar-menu-link:hover {
        color: var(--coffee-caramel) !important;
        background: rgba(198, 154, 107, 0.18) !important;
    }

    /* Card */
    .coffee-card {
        background: #fff;
        border-radius: 14px;
        padding: 24px;
        box-shadow: 0 4px 18px rgba(59, 38, 30, 0.07);
    }

    /* Tombol */
    .btn-coffee {
        background: var(--coffee-brown);
        color: #fff;
        border: 1px solid var(--coffee-brown);
    }

    .btn-coffee:hover {
        background: var(--coffee-dark);
        color: #fff;
    }

    /* Judul halaman */
    .page-title {
        color: var(--coffee-dark);
        font-weight: 750;
    }

    /* Tabel */
    .table thead th {
        background: var(--coffee-cream);
        color: var(--coffee-dark);
        white-space: nowrap;
    }

    /* Form */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--coffee-caramel);
        box-shadow: 0 0 0 0.2rem rgba(198, 154, 107, 0.2);
    }

    /* Tampilan HP */
    @media (max-width: 767px) {
        .sidebar-wrapper {
            width: 200px;
            min-width: 200px;
        }

        .content-page {
            padding: 16px;
        }

        .coffee-card {
            padding: 17px;
        }
    }
</style>

@stack('styles')
