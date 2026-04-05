<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Server Key
    |--------------------------------------------------------------------------
    |
    | Ini adalah kunci rahasia dari Midtrans yang digunakan oleh SERVER
    | Laravel untuk berkomunikasi dengan API Midtrans.
    | Digunakan saat:
    | - membuat Snap Token
    | - mengecek transaksi
    | - menerima callback Midtrans
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Client Key
    |--------------------------------------------------------------------------
    |
    | Client key digunakan oleh FRONTEND (JavaScript Snap.js)
    | untuk membuka popup pembayaran Midtrans.
    |
    | Key ini akan dipakai di Blade:
    |
    | <script src="https://app.sandbox.midtrans.com/snap/snap.js"
    | data-client-key="CLIENT_KEY"></script>
    |
    */

    'client_key' => env('MIDTRANS_CLIENT_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Production Mode
    |--------------------------------------------------------------------------
    |
    | Menentukan apakah aplikasi menggunakan server Midtrans production
    | atau sandbox.
    |
    | false = Sandbox (untuk testing)
    | true  = Production (pembayaran asli)
    |
    */

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Sanitization
    |--------------------------------------------------------------------------
    |
    | Jika true, Midtrans akan melakukan filter otomatis terhadap data
    | yang dikirim ke server Midtrans.
    |
    | Tujuannya untuk mencegah:
    | - karakter ilegal
    | - format data tidak valid
    |
    */

    'is_sanitized' => true,

    /*
    |--------------------------------------------------------------------------
    | 3D Secure
    |--------------------------------------------------------------------------
    |
    | Digunakan khusus untuk pembayaran kartu kredit.
    |
    | Jika true:
    | user akan diminta OTP / verifikasi bank
    | sehingga transaksi lebih aman.
    |
    */

    'is_3ds' => true,



];
