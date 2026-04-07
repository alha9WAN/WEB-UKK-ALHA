<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\ManajemenUserController;
use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Petugas\DashboardController;
use App\Http\Controllers\Petugas\OrderApprovalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\User\RiwayatPeminjamanController;

Route::get('/', [LandingPageController::class, 'index'])
    ->name('halaman-home-user');



// ADMIN
Route::middleware(['auth', 'verified', 'checklevel:admin'])->group(function () {

    Route::view('admin/dashboard', 'admin.pages.dashboard')->name('halaman-dashboard-admin');

// CRUD KATEGORI-ALAT

// LIST DATA
Route::get('/admin/kategori/list', [KategoriController::class, 'index'])
    ->name('admin.kategori.list');

// MENAPLKAN FROM TAMBAH DATA
Route::get('/admin/kategori/create', [KategoriController::class, 'create'])
    ->name('admin.kategori.create');

// PROSES TAMBAH DATA
Route::post('/admin/kategori', [KategoriController::class, 'store'])
    ->name('admin.kategori.proses');

    // EDIT
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit'); //untuk mengambil data yang
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.proses.update'); //untuk proses edit data


    // HAPUS
        //menghapus sesuai id
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy']);


    // END CRUD KATEGORI-ALAT



 // LOG AKTIVITAS
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])
       ->name('log-aktivitas');

 // END LOG AKTIVITAS



//  CRUD ALAT PERTUKANGAN
// LIST DATA
Route::get('/admin/alat/list', [ToolController::class, 'index'])
    ->name('admin.alat.list');


    // MENAPLKAN FROM TAMBAH DATA
Route::get('/admin/alat/create', [ToolController::class, 'create'])
    ->name('admin.alat.create');

    // PROSES TAMBAH DATA
Route::post('/admin/alat', [ToolController::class, 'store'])
    ->name('admin.alat.proses');

    // EDIT
    //untuk mengambil halaman data yang
    Route::get('/admin/alat/{id}/edit', [ToolController::class, 'edit'])->name('admin.alat.edit');
    //untuk proses edit data
    Route::put('/admin/alat/{id}', [ToolController::class, 'update'])->name('admin.alat.proses.update');


    // detail data
    Route::get('/admin/alat/{id}/detail', [ToolController::class, 'show'])->name('admin.alat.detail');

    // HAPUS
        //menghapus sesuai id
    Route::delete('/admin/alat/{id}', [ToolController::class, 'destroy'])->name('hapus.alat');

// END  CRUD ALAT PERTUKANGAN



// CRUD  MANAJEMEN USER

// LIST DATA
Route::get('/admin/manajemen/user/list', [ManajemenUserController::class, 'index'])
    ->name('admin.manajemenuser.list');


        // MENAPLKAN FROM TAMBAH DATA
Route::get('/admin/manajemen/user/create', [ManajemenUserController::class, 'create'])
    ->name('admin.manajemenuser.create');

        // PROSES TAMBAH DATA
Route::post('/admin/manajemen/user', [ManajemenUserController::class, 'store'])
    ->name('admin.manajemenuser.proses');

    //untuk menampilkan halaman edit data
    Route::get('/admin/manajemen/user/{id}/edit', [ManajemenUserController::class, 'edit'])->name('admin.manajemenuser.edit');

    //untuk proses edit data
Route::put('/admin/manajemen/user/{id}', [ManajemenUserController::class, 'update'])->name('admin.manajemenuser.proses.update');

    // detail data
    Route::get('/admin/manajemen/user/{id}/detail', [ManajemenUserController::class, 'show'])->name('admin.manajemenuser.detail');

       // HAPUS
        //menghapus sesuai id
    Route::delete('/admin/manajemen/user/{id}', [ManajemenUserController::class, 'destroy'])
    ->name('hapus.user');

    // END CRUD  MANAJEMEN USER



});

// END  ADMIN



// PETUGAS

Route::middleware(['auth', 'verified', 'checklevel:petugas'])->group(function () {

// DASHBOARD PETUGAS
Route::get('/petugas/dashboard', [DashboardController::class, 'index'])
    ->name('halaman-dashboard-petugas');

    // ROUTE LIST PEMINJAMAN
  Route::get('petugas/peminjaman', [OrderApprovalController::class, 'index'])->name('halaman-list-peminjaman');


      // ROUTE DETAIL PEMINJAMAN
Route::get('/orders/{order}', [OrderApprovalController::class, 'show']);

// ROUTE PERSETUJUAN
Route::post('/orders/{id}/approve', [OrderApprovalController::class, 'approve'])->name('persetujuan');


// ROUTE PENOLAKAN
Route::post('/orders/{id}/reject', [OrderApprovalController::class, 'reject'])->name('penolakan');
});
// END PETUGAS



// USER

Route::middleware(['auth','checklevel:user'])->group(function () {

    Route::get('/', [LandingPageController::class, 'index'])
    ->name('halaman-home-user');

    // halaman dashobard user
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->name('halaman-dashboard-user');

    // HAALAMAN LIST DATA ALAT
        Route::get('/list/alat', [LandingPageController::class, 'listAlat'])
        ->name('halaman-list-alat');


        // HAALAMAN DETAIL DATA ALAT
        Route::get('/detail/alat/{id}', [LandingPageController::class, 'detailAlat'])
        ->name('halaman-detail-alat');


        // HALAMAN RIWAYAT PEMINJAMAN USER
        Route::get('/user/riwayat/peminjaman', [RiwayatPeminjamanController::class, 'index'])
    ->name('halaman-riwayat-peminjaman-user');


        // ORDER


        //MENAPILKAN HALAMAN ORDER
        Route::get('/order/create/{id}', [OrderController::class,'create'])->name('orders.create');
        // PROOSES ORDER
        Route::post('/order/store/{id}', [OrderController::class,'store'])->name('orders.store');

        // ORDERDETAIL
        Route::get('/order/{order}', [OrderController::class,'orderDetail'])->name('halaman.orderDetail');


        // UNTUK MINDTRANS
           //1.halaman pembayaran
    Route::get('/payment/{order}', [PaymentController::class, 'show'])
        ->name('payment.show');

    //2.finish redirect dari midtrans
    Route::get('/payment/finish', [PaymentController::class, 'finish'])
        ->name('payment.finish');

    //3.cek status realtime
    Route::get('/payment/check/{order}', [PaymentController::class, 'checkStatus'])
        ->name('payment.checkStatus');



});
// END MADLWARE USER

// ROUTE BARU MENGARAH KE HALAMAN NOTIFIKASI
Route::get('/notifikasi/pembayaran/berhasil', function (Request $request) {
   return view('user.pages.notif-transaksi-berhasil', [
       'order_id' => $request->order_id
   ]);
});


//4.callback midtrans (tidak perlu auth)
Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('payment.callback');

//END  USER




// MANAJEMEN PROFILE
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // menapilkan halaman edit
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        //proses
            Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});




// FITUR NOTIFIKASI

Route::get('/notifications/latest', [NotificationController::class, 'latest']);
Route::post('/notifications/read/{id}', [NotificationController::class, 'read']);
Route::post('/notifications/read-all', [NotificationController::class, 'readAll']);





Route::get('/debug-midtrans', function() {
    dd([
        'server_key' => config('midtrans.server_key'),
        'client_key' => config('midtrans.client_key'),
        'is_production' => config('midtrans.is_production'),
        'Config::$serverKey' => \Midtrans\Config::$serverKey,
        'Config::$clientKey' => \Midtrans\Config::$clientKey,
    ]);

});






//AUTHENTICATION
Route::middleware('guest')->group(function () {
// REGISTRASI

// TAMPIL FORM REGISTER
Route::get('/registrasi', [AuthenticationController::class, 'showRegister'])->name('show-registrasi');
// PROSES REGISTER
Route::post('/registrasi', [AuthenticationController::class, 'Prosesregister'])->name('proses-registrasi');



//  LOGIN

// TAMPIL FORM LOGIN
// PROSES LOGIN
Route::post('/login', [AuthenticationController::class, 'ProsesLogin'])->name('proses-login');

Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
});


// EMAIL VRIFIKSI

// ROUTE PEMBERITAHUAN VERIFIKASI
Route::get('/email/verifikasi', function () {
    return view('auth.verifikasi');
})->middleware('auth')->name('pemberitahuan-verifikasi-email');


// ROUTE PROSES VERIFIKASI

Route::get('/email/verify/{id}/{hash}',
    [AuthenticationController::class, 'VerifikasiEmail']
)->middleware(['auth', 'signed'])->name('verification.verify');


// ROUTE KIRIM ULANG VERFIKASI
Route::post('/kirim/ulang/email',
    [AuthenticationController::class, 'resendVerification']
)->middleware(['auth', 'throttle:6,1'])
 ->name('kirimulangverfikasi');



//  LOGOUT
Route::post('/logout', [AuthenticationController::class, 'logout'])
    ->name('logout')
    ->middleware('auth'); // hanya user login yang bisa logout



// FITUR GANTI PASWORD

// ROUTE MENAPILKAN HALAMAN ISI EMAIL
Route::get('/forgot-password', [AuthenticationController::class, 'showHalamanIsiEmail'])
    ->name('email.request');

// UNTUK PROSES KIRIM EMIAL
Route::post('/forgot-password', [AuthenticationController::class, 'sendResetLinkEmail'])
    ->name('password.email');

    // kirim ulang reset password
Route::post('/reset-password-resend', [AuthenticationController::class, 'resendResetLink'])
    ->name('password.resend');

    // UNTUK HALAMAN PEMRITAHUAN JIKA EMAIL GANTI PW SUDAH DI KIRIM
    Route::get('/reset-password-notice', function () {
    return view('auth.notif-ganti-pw-email');
})
->name('password.notice');


// UNTUK MENPILKAN HALAMAN GANTI PW DAN MENGIRIM TOKEN
Route::get('/reset-password/{token}', [AuthenticationController::class, 'showResetForm'])
    ->name('password.reset');

    // PROSES GANTI PW
    Route::post('/reset-password', [AuthenticationController::class, 'updatePassword'])
    ->name('password.update');
// END FITUR GANTI PASWORD


// END AUTHENTICATION