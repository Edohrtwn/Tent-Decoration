<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('paket_dekorasi_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('bukti_pembayaran')->nullable(); 
            $table->enum('status_pembayaran', ['Belum Bayar', 'Diproses', 'Sudah Bayar', 'Cancel', 'Pembayaran Ditolak'])->default('Belum Bayar'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('pemesanans');
    }
};
