<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function detail($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('produk.bayar', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function berhasil($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('produk.sudah-bayar', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function uploadBukti(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pemesanans,id',
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $pemesanan = Pemesanan::findOrFail($request->id);

        $path = $request->file('bukti_pembayaran')->store('bukti', 'public');

        $pemesanan->update([
            'bukti_pembayaran' => $path,
            'status_pembayaran' => 'Diproses',
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}
