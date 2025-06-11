<?php

namespace App\Providers;

use App\Models\Kontak;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Kirim data ke semua view yang menggunakan partials.footer
        View::composer(['partials.footer', 'home', 'produk.bayar'], function ($view) {
            $kontak = Kontak::first(); // ambil data pertama saja
            $view->with('kontak', $kontak);
        });
    }
}
