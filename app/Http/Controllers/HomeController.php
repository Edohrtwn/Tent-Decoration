<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pakets = PaketDekorasi::with('dekorasi_photos')->get();
        return view('home', [
            'title' => 'Home',
            'pakets' => $pakets
        ]);
    }
}
