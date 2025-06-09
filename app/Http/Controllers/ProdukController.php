<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;

class ProdukController extends Controller
{
    public function show($id)
    {
        $paket = PaketDekorasi::with(['dekorasi_photos', 'pemesanans'])->findOrFail($id);

        // Ambil semua tanggal yang sudah dipesan
        $bookedDates = $paket->pemesanans->flatMap(function ($p) {
            return collect(CarbonPeriod::create(
                $p->tanggal_mulai,
                $p->tanggal_selesai
            ))->map(fn($date) => $date->format('Y-m-d'));
        })->values()->all();

        return view('produk.show', compact('paket', 'bookedDates'));
    }
}
