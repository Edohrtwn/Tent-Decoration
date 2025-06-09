<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with(['user', 'paket_dekorasi'])->latest()->get();
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::with(['user', 'paket_dekorasi'])->findOrFail($id);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:Belum Bayar,Diproses,Sudah Bayar,Cancel,Pembayaran Ditolak',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status_pembayaran = $request->status_pembayaran;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}

