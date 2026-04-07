<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\ActivityLog;


class AuthenticationController extends Controller
{
    // REGISTRASI

    // MENAPILKAN HALAMAN REGISTRASI

  public function showRegister()
    {
        return view('auth.register');
    }


    // PROSES REGISTRASI

    public function Prosesregister(Request $request)
{
    // VALIDASI
  $request->validate([
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|min:10|max:100|unique:users,email',
            'password' => 'required|string|max:50|min:5',

        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Minimal karakter name adalah 3 huruf.',
            'name.max' => 'Maksimal karakter name adalah 100.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid',
            'email.min' => 'Minimal karakter email adalah 10.',
            'email.max' => 'Maksimal karakter email adalah 100.',
            'email.unique' => 'Email sudah digunakan, coba yang lain.',
            'email.email' => 'Format email tidak valid',


            'password.required' => 'Password wajib diisi',
            'password.max' => 'Maksimal karakter password adalah 50',
            'password.min' => 'Minimal karakter password adalah 5',
        ]);

        // MASUKAN DATABASE
          $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'level'    => 'user',
        ]);

        // KODE UNTUK MENGIRIM EMAIL VERIFIKASI
        event(new Registered($user));


    //  INI YANG KURANG
    Auth::login($user);


    // TAMABAHAKN DISINI LOG AKTIVITAS
    ActivityLog::log('register', ' melakukan registrasi akun');


               // ⬅️ REDIRECT KE PEMBERITAHUAN VERIFIKASI
    return redirect()->route('pemberitahuan-verifikasi-email')
        ->with('success', 'Registrasi berhasil. Silakan cek email untuk verifikasi.');
        // END REGISTRASI
}


    // VERIFIKASI EMAIL
    public function VerifikasiEmail(EmailVerificationRequest $request){

    $request->fulfill();

     // ⬅️ SETELEH VERIFIKASI ARAHKAN KE HALAMAN HOME USER
      return redirect()->route('halaman-home-user')
        ->with('success', 'Email berhasil diverifikasi.');

    }

    // KIRIM ULANG EMAIL VERIFIKASI
    public function resendVerification(Request $request){

        // JIKA EMAIL SUDAH DI VERIFIKASI USER TIDAK BISA VERIFIKASI LAGI
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('login')
            ->with('success', 'Email sudah diverifikasi. Silakan login.');
    }

      // KIRIM ULANG VERIFIKASI
    $request->user()->sendEmailVerificationNotification();

    // AKAN MENGARAHKAN KE HALAMAN SEMULA TAPI ADA NOTIF

   return back()->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Link verifikasi telah dikirim ulang. Silakan cek email.',
        ]);

    }



        // LOGIN


    // MENAPILKAN HALAMAN LOGIN

  public function showLogin()
    {
        return view('auth.login');
    }


    // PROSES  LOGIN

    public function ProsesLogin(Request $request)
{

        // VALIDASI
  $request->validate([
        'email' => 'required|email|max:100',
        'password' => 'required|max:50'
    ], [
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.max' => 'Maksimal karakter email adalah 100 huruf',
        'password.required' => 'Password wajib diisi',
        'password.max' => 'Maksimal karakter password adaalah 50 huruf'
    ]);


    /// Ambil data user berdasarkan email yang diinput
$user = User::where('email', $request->email)->first();


// Jika email tidak terdaftar
if (!$user) {
    return back()->withErrors([
        'email' => 'Email tidak terdaftar'
    ])->withInput();
}

// cek password manual
if (!Hash::check($request->password, $user->password)) {
    return back()->withErrors([
        'password' => 'Password salah'
    ])->withInput();
}


// cek apakah email sudah terverifikasi
if (!$user->hasVerifiedEmail()) {
    return back()->withErrors([
        'email' => 'Email belum diverifikasi'
    ])->withInput();
}

// proses login
if (Auth::attempt($request->only('email', 'password'))) {
    $request->session()->regenerate();
    $user = Auth::user();
}


// LOG AKTIVITAS
ActivityLog::log('login', 'login ke sistem');


    // ARAHKAN SESUAI ROLE

if ($user->level === 'admin') {
    return redirect()->route('halaman-dashboard-admin')
        ->with('swal', [
            'type' => 'success',
            'title' => 'Login Berhasil!',
            'text' => 'Berhasil login sebagai admin',
        ]);
}


  //role petugas
    if ($user->level === 'petugas') {
           return redirect()->route('halaman-dashboard-petugas')
        ->with('swal', [
            'type' => 'success',
            'title' => 'Login Berhasil!',
            'text' => 'Berhasil login sebagai petugas',
        ]);

}

    // ROLE USER
    if ($user->level === 'user') {

        return redirect()->route('halaman-home-user')->with('swal', [
            'type' => 'success',
            'title' => 'Login Berhasil!',
            'text' => 'Selamat Datang Di Website Rental Kami',
        ]);

}

}

// LOGOUT

public function logout(Request $request)
{

    // LOG AKTIVITAS
if (auth()->check()) {
    ActivityLog::log('logout', 'logout dari sistem');
}

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

       return redirect('login')->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil Log Out ',
        ]);
}




// FITUR GANTI PW

// HALAMAN UNTUK USER ISI(KIRIM) EMAIL
 public function showHalamanIsiEmail()
{
    return view('auth.halaman-email-ganti-pw');
}


//UNTUK MENGRIRIM LINK GANTI PW LWAT EMAIL
    public function sendResetLinkEmail(Request $request)
    {

        // validasi
    $request->validate(
        [
            'email' => 'required|email|max:50|exists:users,email'
        ],
        [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.max'      => 'Maksimal email 50 karakter.',
            'email.exists'   => 'Email tidak terdaftar di sistem.'
        ]

);

    //Untuk mengirim link reset password ke email user yang lupa password
    $status = Password::sendResetLink(
    $request->only('email')
);

//Menentukan respon ke user berdasarkan hasil pengiriman email reset password.
if ($status === Password::RESET_LINK_SENT) {

        // 🔥 SIMPAN EMAIL
        session()->put('reset_email', $request->email);

        return redirect()->route('password.notice')
            ->with('success', 'Link reset password telah dikirim ke email.');
    }

  return back()->withErrors([
        'email' => 'Gagal mengirim link reset password.'
    ]);
}

// PROSES KIRIM ULANG LINK GANTI PW MELALAUI EMAIL
public function resendResetLink(Request $request)
{

    // mengecek apakah sesiaon ada
      if (!session()->has('reset_email')) {
        return redirect()->route('email.request')
            ->withErrors(['email' => 'Session habis, silakan isi email kembali.']);
    }

    //Laravel mengirim ulang email reset password menggunakan email yang disimpan di session reset_email.
        $status = Password::sendResetLink([
        'email' => session('reset_email')
    ]);
   return back()->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Link ganti password telah dikirim ulang. Silakan cek email.',
        ]);
}



    // UNTUK MENPILKAN HALAMAN GANTI PW DAN OTOMATSI DI ISI TOKEN
   public function showResetForm(Request $request, $token)
{
    return view('auth.ganti-password', [
        'token' => $token,
        'email' => $request->query('email')
    ]);
}


// PROSES GANTI PASWOARD
public function updatePassword(Request $request)
{
 // validasi
$request->validate([
    'token' => 'required',
    'email' => 'required|email',
    'password' => 'required|min:5|confirmed',
], [
    'token.required' => 'Token reset password wajib diisi.',

    'email.required' => 'Email wajib diisi.',
    'email.email' => 'Format email tidak valid.',

    'password.required' => 'Password wajib diisi.',
    'password.min' => 'Password minimal 5 karakter.',
    'password.confirmed' => 'Konfirmasi password tidak cocok.',
]);


    // 2. PROSES RESET PASSWORD
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {

            // 3. SIMPAN PASSWORD BARU (DI-HASH)
            $user->password = Hash::make($password);
            $user->save();
        }
    );

  return $status === Password::PASSWORD_RESET
    ? redirect()->route('login')->with('swal', [
        'type'  => 'success',
        'title' => 'Berhasil!',
        'text'  => 'Password berhasil diubah. Silakan login dengan password baru.',
    ])
    : back()->withErrors([
        'email' => 'Token tidak valid atau sudah kadaluarsa.',
    ]);


}

}