<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // STATUS
            $table->enum('status', [
                'dipinjam',
                'terlambat',
                'dikembalikan'
            ])->default('dipinjam');

            // WAKTU PEMINJAMAN
            $table->date('start_date'); // mulai pinjam
            $table->date('end_date');   // batas kembali

            // FITUR PENGEMBLIAN

            // WAKTU PENGEMBALIAN
            $table->date('actual_return_date')->nullable();

            // KONDISI SAAT KEMBALI
            $table->enum('return_condition', [
                'baik',
                'rusak_ringan',
                'rusak_berat',
                'hilang'
            ])->nullable();

            $table->text('return_notes')->nullable();
            $table->string('return_photo')->nullable(); // foto bukti

            $table->timestamps();

            $table->index('status');
            $table->index(['user_id', 'status']);

           

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }


};