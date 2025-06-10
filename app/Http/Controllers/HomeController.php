<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use Illuminate\Http\Request;
use App\Models\Review;
class HomeController extends Controller
{
    public function index()
{
    $pakets = PaketDekorasi::with(['dekorasi_photos', 'reviews.user'])->get();
    $allReviews = Review::with('user')->latest()->get();

    return view('home', [
        'title' => 'Home',
        'pakets' => $pakets,
        'allReviews' => $allReviews
    ]);
}
}
