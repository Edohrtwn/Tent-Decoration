<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with(['user', 'paket_dekorasi'])
                        ->where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('user.dashboard', compact('pemesanans'));
    }

}
