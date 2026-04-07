<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | PRIMARY KEY
            |--------------------------------------------------------------------------
            */
            $table->id();


            /*
            |--------------------------------------------------------------------------
            | RELASI
            |--------------------------------------------------------------------------
            */

            // Nomor invoice untuk Midtrans
            $table->string('invoice_number')->unique();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | DATA PEMINJAM
            |--------------------------------------------------------------------------
            */

            $table->string('name');                // Nama lengkap
            $table->string('email')->index();      // Email
            $table->string('nik')->nullable();     // NIK (opsional)
            $table->string('phone');               // Nomor HP
            $table->text('address');               // Alamat
            $table->text('notes')->nullable();     // Catatan tambahan


            /*
            |--------------------------------------------------------------------------
            | DATA PEMINJAMAN
            |--------------------------------------------------------------------------
            */

            $table->decimal('gross_amount', 12, 2); // Total pembayaran

           $table->enum('status', [
    'waiting_approval', //menunggu persetujuan petugas
    'approved', // disetujui petugas
    'rejected', // di tolak petugas
    'completed' // selseai
])->default('waiting_approval'); // defalut menunggu di setujui


            // ✅ TAMBAHAN: Alasan penolakan (untuk status rejected)
            $table->text('rejection_reason')->nullable();

            $table->date('start_date');        // Tanggal mulai pinjam
            $table->date('end_date');          // Tanggal selesai
            $table->integer('duration_days');  // Lama pinjam (hari)

            $table->text('purpose');           // Tujuan peminjaman
            $table->string('ktp_image');       // Foto KTP


            /*
            |--------------------------------------------------------------------------
            | TAMBAHAN UNTUK FITUR MINDTRANS

            |--------------------------------------------------------------------------
            */
 //1.Token dari Midtrans untuk membuka popup pembayaran (Snap.js)

$table->string('snap_token')->nullable();

// 2.Status pembayaran dari Midtrans:
// pending = belum dibayar
// paid = pembayaran berhasil
// expired = waktu pembayaran habis
// failed = pembayaran gagal
$table->enum('payment_status', [
    'pending',
    'paid',
    'expired',
    'failed'
])->default('pending');

// 3.Batas waktu pembayaran (biasanya 24 jam setelah order dibuat)
$table->timestamp('payment_expired_at')->nullable();

// 4.Metode pembayaran yang dipilih user (qris, bank_transfer, gopay, dll)
$table->string('payment_method')->nullable();


// 5.ID transaksi dari Midtrans untuk identifikasi transaksi di sistem Midtrans
$table->string('midtrans_transaction_id')->nullable();

// DAN TAMBAHAN INDEX
// Index untuk performance
            $table->index('status');
            $table->index('payment_status');


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }

};
 