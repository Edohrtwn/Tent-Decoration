<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil user yang sedang login

        $pemesanans = Pemesanan::with(['user', 'paket_dekorasi'])
                        ->where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('user.dashboard', compact('pemesanans', 'user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password' => 'nullable|string|confirmed|min:6',
        ]);

        $data = $request->only('first_name', 'last_name', 'phone', 'address');

        // Upload Foto
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Ganti Password
        if ($request->filled('new_password')) {
            if (!\Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak cocok']);
            }
            $data['password'] = bcrypt($request->new_password);
        }

        $user->update($data);

        return redirect()->route('user.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

}
