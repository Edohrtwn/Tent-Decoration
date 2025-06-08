<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketDekorasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_paket', 'harga', 'detail', 'foto_tenda'];

    public function dekorasi_photos()
    {
        return $this->hasMany(DekorasiPhoto::class);
    }
}

