<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function detail($id)
    {
        // Contoh ambil data produk dari database
        // $produk = Produk::findOrFail($id); // jika kamu punya model Produk

        return view('produk.bayar', [
            'id' => $id, // sementara cuma kirim ID, nanti bisa ganti dengan $produk
        ]);
    }
}
