<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang boleh diisi
     * Ini adalah data yang akan kita simpan dari response Midtrans
     */
    protected $fillable = [
        'order_id',             // ID order dari tabel orders (relasi)
        'transaction_id',       // ID transaksi dari Midtrans (unique)
        'order_id_midtrans',    // order_id yang dikirim ke Midtrans (invoice_number)
        'payment_type',         // Jenis pembayaran: bank_transfer, credit_card, gopay, dll
        'bank',                 // Nama bank: bca, bni, bri, mandiri
        'va_number',            // Nomor Virtual Account (untuk transfer bank)
        'bill_key',             // Bill key untuk Mandiri
        'biller_code',          // Biller code untuk Mandiri
        'pdf_url',              // URL instruksi pembayaran (PDF)
        'transaction_status',   // Status dari Midtrans: pending, settlement, capture, deny, expire
        'fraud_status',         // Status fraud: accept / challenge (khusus kartu kredit)
        'raw_response',         // Menyimpan response lengkap dari Midtrans (format JSON)
        'snap_token',           // Snap token yang digunakan (optional, sudah ada di orders)
    ];

    /**
     * Tipe data yang perlu di-cast
     * raw_response akan otomatis jadi array ketika diakses
     */
    protected $casts = [
        'raw_response' => 'array', // JSON di DB otomatis jadi array PHP
    ];

    /**
     * RELASI: Payment milik 1 Order
     * Inverse dari hasOne di Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
        // Cara pakai: $payment->order->invoice_number
    }

    /**
     * HELPER: Cek apakah pembayaran sukses
     * Digunakan di view/logika setelah callback
     */
    public function isSuccess(): bool
    {
        // settlement = transfer sukses Bank, capture = kartu kredit sukses
        return in_array($this->transaction_status, ['settlement', 'capture']);
    }

    /**
     * HELPER: Cek apakah pembayaran masih pending
     * Menunggu pembayaran (transfer belum masuk)
     */
    public function isPending(): bool
    {
        return $this->transaction_status === 'pending';
    }

    /**
     * HELPER: Cek apakah pembayaran expired
     * Batas waktu pembayaran habis
     */
    public function isExpired(): bool
    {
        return $this->transaction_status === 'expire';
    }

    /**
     * HELPER: Cek apakah pembayaran gagal
     * deny = ditolak, cancel = dibatalkan, failure = gagal
     */
    public function isFailed(): bool
    {
        return in_array($this->transaction_status, ['deny', 'cancel', 'failure']);
    }
}