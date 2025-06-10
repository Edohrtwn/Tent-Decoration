<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'nullable|string',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'qris' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->alamat = $request->alamat;
        $kontak->instagram = $request->instagram;
        $kontak->tiktok = $request->tiktok;
        $kontak->whatsapp = $request->whatsapp;

        $path = $request->file('qris')->store('qris', 'public');
        $kontak->qris = $path;

        $kontak->save();

        return redirect()->route('kontak.index')->with('success', 'Data berhasil diperbarui!');
    }
}
