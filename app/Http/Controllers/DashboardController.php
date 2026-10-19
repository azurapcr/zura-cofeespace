<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();
        $totalPelanggan = Pelanggan::count();
        $totalPesanan = Pesanan::count();
        $totalPendapatan = Pesanan::sum('total_harga');

        $pesananTerbaru = Pesanan::latest()->take(5)->get();

        return view('Dashboard.index', compact(
            'totalMenu',
            'totalPelanggan',
            'totalPesanan',
            'totalPendapatan',
            'pesananTerbaru'
        ));
    }
}
