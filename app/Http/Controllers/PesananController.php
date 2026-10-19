<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    // =========================
    // CRUD ADMIN
    // =========================

    public function index()
    {
        $pesanan = Pesanan::all();

        return view('pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        return view('pesanan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'menu' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        Pesanan::create($data);

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'menu' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $pesanan->update($data);

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diubah.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    // =========================
    // KERANJANG PELANGGAN
    // =========================

    public function simpanKeranjang(Request $request)
    {
        $data = $request->validate([
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|integer|min:0|max:99',
        ]);

        $keranjang = [];

        foreach ($data['jumlah'] as $menuId => $jumlah) {
            if ((int) $jumlah > 0) {
                $menu = Menu::find($menuId);

                if (!$menu) {
                    return back()->withErrors([
                        'keranjang' => 'Ada menu yang tidak ditemukan.',
                    ]);
                }

                $keranjang[$menu->id] = (int) $jumlah;
            }
        }

        if (empty($keranjang)) {
            return back()->withErrors([
                'keranjang' => 'Pilih minimal satu menu terlebih dahulu.',
            ]);
        }

        session(['keranjang' => $keranjang]);

        return redirect()->route('guest.checkout');
    }

    // =========================
    // HALAMAN CHECKOUT
    // =========================

    public function checkout()
    {
        $pilihan = session('keranjang', []);

        if (empty($pilihan)) {
            return redirect()->route('guest.home')
                ->with('error', 'Pilih menu terlebih dahulu.');
        }

        $keranjang = [];
        $totalHarga = 0;

        foreach ($pilihan as $menuId => $jumlah) {
            $menu = Menu::find($menuId);

            if (!$menu) {
                continue;
            }

            $subtotal = $menu->harga * $jumlah;

            $keranjang[] = [
                'menu_id' => $menu->id,
                'nama_menu' => $menu->nama_menu,
                'harga' => $menu->harga,
                'jumlah' => $jumlah,
                'subtotal' => $subtotal,
            ];

            $totalHarga += $subtotal;
        }

        if (empty($keranjang)) {
            session()->forget('keranjang');

            return redirect()->route('guest.home')
                ->with('error', 'Menu tidak tersedia. Silakan pilih ulang.');
        }

        return view('guest.checkout', compact(
            'keranjang',
            'totalHarga'
        ));
    }

    // =========================
    // SIMPAN CHECKOUT
    // =========================

    public function storeCheckout(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:1000',
        ]);

        $pilihan = session('keranjang', []);

        if (empty($pilihan)) {
            return redirect()->route('guest.home')
                ->with('error', 'Keranjang kosong. Silakan pilih menu lagi.');
        }

        DB::transaction(function () use ($data, $pilihan) {
            // Simpan data pelanggan
            Pelanggan::create([
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
            ]);

            // Simpan setiap jenis menu sebagai baris pesanan
            foreach ($pilihan as $menuId => $jumlah) {
                $menu = Menu::findOrFail($menuId);

                Pesanan::create([
                    'nama_pelanggan' => $data['nama'],
                    'menu' => $menu->nama_menu,
                    'jumlah' => $jumlah,
                    'total_harga' => $menu->harga * $jumlah,
                ]);
            }
        });

        // Kosongkan keranjang setelah pesanan tersimpan
        session()->forget('keranjang');

        return redirect()->route('guest.home')
            ->with('success', 'Pesanan berhasil dikirim! Terima kasih sudah memesan di Zura Coffee Space.');
    }

    // =========================
    // PEMESANAN SATU MENU LAMA
    // Tetap dipertahankan
    // =========================

    public function formGuest($menu)
    {
        $menuDipilih = Menu::findOrFail($menu);

        return view('guest.pesan', compact('menuDipilih'));
    }

    public function storeGuest(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:1000',
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $menuDipilih = Menu::findOrFail($data['menu_id']);
        $totalHarga = $menuDipilih->harga * $data['jumlah'];

        DB::transaction(function () use ($data, $menuDipilih, $totalHarga) {
            Pelanggan::create([
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
            ]);

            Pesanan::create([
                'nama_pelanggan' => $data['nama'],
                'menu' => $menuDipilih->nama_menu,
                'jumlah' => $data['jumlah'],
                'total_harga' => $totalHarga,
            ]);
        });

        return redirect()->route('guest.home')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
