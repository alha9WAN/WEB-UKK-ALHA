<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $user = auth()->user();

    if ($user->level === 'admin') {
        return view('admin.pages.profile.profile', compact('user'));
    }

    if ($user->level === 'petugas') {
        return view('petugas.pages.profile.profile', compact('user'));
    }

    return view('user.pages.profile.profile', compact('user'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit()
{
    $data_user = auth()->user();

    if ($data_user->level === 'admin') {
        return view('admin.pages.profile.edit', compact('data_user'));
    }

    if ($data_user->level === 'petugas') {
        return view('petugas.pages.profile.edit', compact('data_user'));
    }

    return view('user.pages.profile.edit', compact('data_user'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request)
{
    $user = auth()->user(); // 🔐 user yang sedang login

    $request->validate([
        'name'      => 'required|min:3|max:100',
        'email'     => 'required|email|unique:users,email,' . $user->id,
        'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'alamat'    => 'nullable|string',
        'nomor_hp'  => 'nullable|string|max:20',
    ], [
        'name.required' => 'Nama wajib diisi!',
        'name.min'      => 'Nama minimal 3 karakter!',
        'name.max'      => 'Nama maksimal 100 karakter!',
        'email.required'=> 'Email wajib diisi!',
        'email.email'   => 'Format email tidak valid!',
        'email.unique'  => 'Email sudah digunakan!',
        'foto.image'    => 'File harus berupa gambar!',
        'foto.mimes'    => 'Format foto harus jpeg, png, atau jpg!',
        'foto.max'      => 'Ukuran foto maksimal 2MB!',
        'nomor_hp.max'  => 'Nomor HP maksimal 20 karakter!',
    ]);

    // ================= FOTO =================
    if ($request->hasFile('foto')) {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->foto = $request->file('foto')->store('users', 'public');
    }

    // ================= EMAIL =================
      $oldEmail = $user->email;
    if ($oldEmail !== $request->email) {
        $user->email = $request->email;
        $user->email_verified_at = now(); // otomatis verifikasi
    }

    // ================= DATA LAIN =================
    $user->name     = $request->name;
    $user->alamat   = $request->alamat;
    $user->nomor_hp = $request->nomor_hp;

    $user->save();

    ActivityLog::log('update', 'User mengupdate profile sendiri');

    return redirect()->route('profile.index')->with('swal', [
        'type'  => 'success',
        'title' => 'Berhasil!',
        'text'  => 'Profile berhasil diperbarui',
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
