<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    protected $fillable = [
        'user_id',
        'paket_dekorasi_id',
        'isi',
        'rating',
    ];

    public function paket()
    {
        return $this->belongsTo(PaketDekorasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
