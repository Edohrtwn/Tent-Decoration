<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'paket_dekorasi_id' => 'required|exists:paket_dekorasis,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $paketId = $request->paket_dekorasi_id;
        $mulai = $request->tanggal_mulai;
        $selesai = $request->tanggal_selesai;

        $overlap = Pemesanan::where('paket_dekorasi_id', $paketId)
            ->where('status_pembayaran', '!=', 'Cancel')
            ->where(function ($query) use ($mulai, $selesai) {
                $query->whereBetween('tanggal_mulai', [$mulai, $selesai])
                    ->orWhereBetween('tanggal_selesai', [$mulai, $selesai])
                    ->orWhere(function ($query) use ($mulai, $selesai) {
                        $query->where('tanggal_mulai', '<=', $mulai)
                            ->where('tanggal_selesai', '>=', $selesai);
                    });
            })
            ->exists();


        if ($overlap) {
            return back()->withErrors(['Tanggal sudah dipesan. Silakan pilih tanggal lain.'])->withInput();
        }

        $pemesanan = Pemesanan::create([
            'user_id' => Auth::id(), // ← Simpan ID user yang login
            'paket_dekorasi_id' => $paketId,
            'tanggal_mulai' => $mulai,
            'tanggal_selesai' => $selesai,
        ]);

        return redirect()->route('pembayaran.detail', $pemesanan->id)
            ->with('success', 'Pemesanan berhasil disimpan. Silakan lanjutkan ke pembayaran.');
    }
}
