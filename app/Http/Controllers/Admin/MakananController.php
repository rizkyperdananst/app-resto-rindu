<?php

namespace App\Http\Controllers\Admin;

use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    public function edit($id)
    {
        $m = Makanan::find($id);

        return view('dashboard.makanan.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'gambar' => 'nullable|image|file|max:5120|mimes:jpg,jpeg,png',
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $namaReplace = str_replace(' ', '', $request->nama);
        $nama = strtolower($namaReplace);

        $makanan = Makanan::find($id);
        
        if($request->file('gambar')) {
            $namaGambarOld = 'storage/makanans/'. $makanan->gambar;
            if(File::exists($namaGambarOld)) {
                File::delete($namaGambarOld);
                
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $namaGambar = $nama .'-'. rand() .'.'. $extension;
                $path = $request->file('gambar')->storeAs('makanans', $namaGambar, 'public');
            }
        } else {
            $namaGambar = $makanan->gambar;
        }

        $makanan = Makanan::find($id)->update([
            'gambar' => $namaGambar,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Data Makanan Berhasil Di Update');
    }

    public function destroy($id)
    {
        $makanan = Makanan::find($id);
        $namaGambarOld = File::delete('storage/makanans/'. $makanan->gambar);
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Data Makanan Berhasil Di Hapus');
    }

}
