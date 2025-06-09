<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = ['paket_dekorasi_id', 'tanggal_mulai', 'tanggal_selesai', 'bukti_pembayaran', 'status_pembayaran'];

    public function paket_dekorasi()
    {
        return $this->belongsTo(PaketDekorasi::class, 'paket_dekorasi_id');
    }
}
