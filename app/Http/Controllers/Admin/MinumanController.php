<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MinumanController extends Controller
{
    public function index()
    {
        $minumans = Minuman::orderBy('id', 'desc')->get();

        return view('dashboard.minuman.index', compact('minumans'));
    }

    public function create()
    {
        return view('dashboard.minuman.create');
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
        $path = $request->file('gambar')->storeAs('minumans', $namaGambar, 'public');

        $minuman = Minuman::create([
            'gambar' => $namaGambar,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('minuman.index')->with('success', 'Data Minuman Berhasil Di Tambahkan');
    }
    
    public function edit($id)
    {
        $m = Minuman::find($id);

        return view('dashboard.minuman.edit', compact('m'));
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

        $minuman = Minuman::find($id);
        
        if($request->file('gambar')) {
            $namaGambarOld = 'storage/minumans/'. $minuman->gambar;
            if(File::exists($namaGambarOld)) {
                File::delete($namaGambarOld);
                
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $namaGambar = $nama .'-'. rand() .'.'. $extension;
                $path = $request->file('gambar')->storeAs('minumans', $namaGambar, 'public');
            }
        } else {
            $namaGambar = $minuman->gambar;
        }

        $minuman = Minuman::find($id)->update([
            'gambar' => $namaGambar,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('minuman.index')->with('success', 'Data Minuman Berhasil Di Update');
    }

    public function destroy($id)
    {
        $minuman = Minuman::find($id);
        $namaGambarOld = File::delete('storage/minumans/'. $minuman->gambar);
        $minuman->delete();

        return redirect()->route('minuman.index')->with('success', 'Data Minuman Berhasil Di Hapus' . $minuman->id);
    }

}