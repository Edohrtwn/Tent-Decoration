<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaketDekorasi;
use App\Models\DekorasiPhoto;
use Illuminate\Support\Facades\Storage;

class PaketDekorasiController extends Controller
{
    public function index()
    {
        $pakets = PaketDekorasi::with('dekorasi_photos')->get();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'detail' => 'required',
            'dekorasi_foto.*' => 'image|mimes:jpg,jpeg,png'
        ]);

        $paket = PaketDekorasi::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'detail' => $request->detail,
        ]);

        if ($request->hasFile('dekorasi_foto')) {
            foreach ($request->file('dekorasi_foto') as $foto) {
                $path = $foto->store('dekorasi', 'public');
                DekorasiPhoto::create([
                    'paket_dekorasi_id' => $paket->id,
                    'foto' => $path
                ]);
            }
        }

        return redirect()->route('paket-dekorasi.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show(PaketDekorasi $paket_dekorasi)
    {
        //
    }

    public function edit(PaketDekorasi $paket_dekorasi)
    {
        $paket = $paket_dekorasi->load('dekorasi_photos');
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, PaketDekorasi $paket_dekorasi)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'detail' => 'required',
            'dekorasi_foto.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        // Update data dasar
        $paket_dekorasi->update([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'detail' => $request->detail,
        ]);

        // Simpan foto baru jika ada
        if ($request->hasFile('dekorasi_foto')) {
            foreach ($request->file('dekorasi_foto') as $foto) {
                $path = $foto->store('dekorasi', 'public');
                DekorasiPhoto::create([
                    'paket_dekorasi_id' => $paket_dekorasi->id,
                    'foto' => $path
                ]);
            }
        }

        return redirect()->route('paket-dekorasi.index')->with('success', 'Paket berhasil diperbarui.');
    }


    public function destroy(PaketDekorasi $paket_dekorasi)
    {

        foreach ($paket_dekorasi->dekorasi_photos as $foto) {
            Storage::disk('public')->delete($foto->foto);
            $foto->delete();
        }

        $paket_dekorasi->delete();
        return back()->with('success', 'Paket berhasil dihapus.');
    }

    public function deleteFoto(DekorasiPhoto $foto)
    {
        Storage::disk('public')->delete($foto->foto);
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

}
