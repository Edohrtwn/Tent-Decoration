<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($id)
    {
        // Contoh ambil data produk dari database
        // $produk = Produk::findOrFail($id); // jika kamu punya model Produk

        return view('produk.show', [
            'id' => $id, // sementara cuma kirim ID, nanti bisa ganti dengan $produk
        ]);
    }
}
