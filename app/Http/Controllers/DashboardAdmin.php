<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil user yang sedang login
        return view('admin.dashboard', compact('user'));
    }

}
