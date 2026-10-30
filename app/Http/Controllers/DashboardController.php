<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menggunakan Eloquent
        $totalMenu = Menu::count();
        $totalPelanggan = Pelanggan::count();

        $pesananTerbaru = Pesanan::latest()
            ->take(5)
            ->get();

        // Menggunakan Query Builder
        $totalPesanan = DB::table('pesanans')->count();

        $totalPendapatan = DB::table('pesanans')
            ->sum('total_harga');

        $totalItemTerjual = DB::table('pesanans')
            ->sum('jumlah');

        return view('Dashboard.index', compact(
            'totalMenu',
            'totalPelanggan',
            'totalPesanan',
            'totalPendapatan',
            'totalItemTerjual',
            'pesananTerbaru'
        ));
    }
}
