<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use App\Models\Review;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function show($id)
    {
        $paket = PaketDekorasi::with(['dekorasi_photos', 'pemesanans', 'reviews'])->findOrFail($id);

        $pakets = PaketDekorasi::with(['dekorasi_photos', 'pemesanans'])->get();

        $bookedDates = $pakets->flatMap(function ($paket) {
            return $paket->pemesanans
                ->filter(fn($p) => $p->status_pembayaran !== 'Cancel')
                ->flatMap(function ($p) {
                    return collect(CarbonPeriod::create(
                        $p->tanggal_mulai,
                        $p->tanggal_selesai
                    ))->map(fn($date) => $date->format('Y-m-d'));
                });
        })->unique()->values()->all();

        $reviews = $paket->reviews;

        // Hitung rata-rata rating (dibulatkan ke bawah untuk bintang penuh)
        $averageRating = floor($reviews->avg('rating'));

        // Hitung total review
        $totalReviews = $reviews->count();

        return view('produk.show', compact('paket', 'bookedDates', 'averageRating', 'totalReviews', 'pakets'));
    }

    
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'paket_dekorasi_id' => $id,
            'isi' => $request->isi,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan.');
    }
}
