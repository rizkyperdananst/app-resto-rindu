<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::orderBy('id', 'desc')->get();

        return view('dashboard.makanan.index', compact('makanans'));
    }

    public function create()
    {
        return view('dashboard.makanan.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'gambar' => 'required|image|file|max:5120|mimes:jpg,jpeg,png',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $namaReplace = str_replace(' ', '', $request->nama);
        $nama = strtolower($namaReplace);

        $extension = $request->file('gambar')->getClientOriginalExtension();
        $namaGambar = $nama .'-'. rand() .'.'. $extension;
        $path = $request->file('gambar')->storeAs('makanans', $namaGambar, 'public');

        $makanan = Makanan::create([
            'gambar' => $namaGambar,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Data Makanan Berhasil Di Tambahkan');
    }

}
