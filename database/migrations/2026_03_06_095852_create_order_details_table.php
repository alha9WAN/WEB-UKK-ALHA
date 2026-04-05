<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel order_details untuk menyimpan detail alat yang dipinjam
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Primary key auto increment

            // Foreign Keys - Relasi dengan tabel orders dan products
            $table->foreignId('order_id')
                  ->constrained() // Referensi ke tabel orders
                  ->onDelete('cascade'); // Jika order dihapus, detail ikut terhapus



                  $table->foreignId('tool_id')
      ->constrained('tools')// Referensi ke tabel products
      ->onDelete('cascade'); // Jika product dihapus, detail ikut terhapus

            // Informasi detail peminjaman
            $table->integer('quantity')
                  ->default(1); // Jumlah unit alat yang dipinjam, default 1

            $table->decimal('price_per_day', 10, 2); // Harga per hari saat peminjaman (snapshot)

            $table->decimal('subtotal', 12, 2); // Total harga untuk item ini (quantity * price_per_day * duration_days)



            // Timestamps untuk created_at dan updated_at
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     * Menghapus tabel order_details
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
