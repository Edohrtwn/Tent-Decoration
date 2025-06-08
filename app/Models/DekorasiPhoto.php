<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DekorasiPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['paket_dekorasi_id', 'foto'];

    public function paket_dekorasi()
    {
        return $this->belongsTo(PaketDekorasi::class);
    }
}

