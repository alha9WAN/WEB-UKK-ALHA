<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'invoice_number',      // Nomor invoice unik
        'user_id',             // ID user yang pinjam
        'name',                // Nama lengkap (input manual)
        'email',               // Email (input manual)
        'nik',                 // NIK (opsional)
        'phone',               // No telepon
        'address',             // Alamat
        'notes',               // Catatan (opsional)
        'gross_amount',        // Total biaya
'status', // waiting_approval, approved, rejected, completed
'rejection_reason',         // ✅ TAMBAHAN: Alasan penolakan
        'start_date',          // Tanggal mulai
        'end_date',            // Tanggal selesai
        'duration_days',       // Lama hari
        'purpose',             // Tujuan peminjaman
        'ktp_image',           // Foto KTP
        //1.TAMBAHAN
        'snap_token',
    'payment_status',
    'payment_expired_at',
    'payment_method',
    'midtrans_transaction_id',

    ];

    //   2.TAMBAHAN UNTUK CASTS
    protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
    'payment_expired_at' => 'datetime',
];

// 3.TAMBAHAN RELASI
/**
 * Relasi ke Payment
 * 1 Order memiliki 1 pembayaran
 */
public function payment()
{
    return $this->hasOne(Payment::class);
}
        /**
     * Relasi ke User
     * 1 Order dimiliki oleh 1 User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke OrderDetail
     * 1 Order memiliki banyak detail alat
     */
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }


    // 4.HLEPR UNTUK STATUS MINDTRANS
    public function isPaid()
{
    return $this->payment_status === 'paid';
}

public function isPending()
{
    return $this->payment_status === 'pending';
}

public function isExpired()
{
    return $this->payment_status === 'expired';
}

   /**
     * ✅ TAMBAHAN: Relasi ke Rental
     * 1 Order memiliki 1 rental (setelah disetujui)
     */
    public function rental()
    {
        return $this->hasOne(Rental::class);
    }

}
