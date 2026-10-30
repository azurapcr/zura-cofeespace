<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

public function index(Request $request)
{
    $query = Menu::query();

    // Pencarian berdasarkan nama menu
    if ($request->filled('search')) {
        $query->where('nama_menu', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    $menu = $query->get();

    // Mengambil daftar kategori
    $categories = Menu::select('kategori')
        ->distinct()
        ->pluck('kategori');

    return view('menu.index', compact(
        'menu',
        'categories'
    ));
}


    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diubah.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
