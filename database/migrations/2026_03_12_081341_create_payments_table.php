<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Relasi ke orders
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');

            // Data dari Midtrans
            $table->string('transaction_id')->unique()->nullable(); // ID dari Midtrans
            $table->string('order_id_midtrans')->nullable(); // order_id yg dikirim ke Midtrans
            $table->string('payment_type')->nullable(); // bank_transfer, credit_card, gopay, dll
            $table->string('bank')->nullable(); // bca, bni, bri, mandiri
            $table->string('va_number')->nullable(); // Nomor Virtual Account
            $table->string('bill_key')->nullable(); // Untuk Mandiri
            $table->string('biller_code')->nullable(); // Untuk Mandiri
            $table->string('pdf_url')->nullable(); // URL instruksi pembayaran

            // Status pembayaran dari Midtrans
            $table->enum('transaction_status', [
                'pending', 'settlement', 'capture', 'deny',
                'cancel', 'expire', 'failure', 'refund',
            ])->default('pending');

            $table->string('fraud_status')->nullable(); // accept / challenge

            // Data lengkap dari Midtrans (JSON)
            $table->json('raw_response')->nullable();

            // Snap Token (disimpan di orders juga)
            $table->string('snap_token')->nullable();

            $table->timestamps();

            // Index untuk pencarian
            $table->index('transaction_id');
            $table->index('transaction_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
