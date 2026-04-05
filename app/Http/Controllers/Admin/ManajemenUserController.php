<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
   $keyword = $request->keyword;
    $level   = $request->level;
    $status  = $request->status;
    $date    = $request->date;

        $data_user = User::query()

        // 🔍 SEARCH
        ->when($keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%")
                  ->orWhere('nomor_hp', 'like', "%{$keyword}%");
            });
        })


            // 👤 FILTER LEVEL
        ->when($level, fn ($q) => $q->where('level', $level))


                // 🟢⚫ FILTER STATUS ONLINE
        ->when($status, function ($q) use ($status) {
            if ($status === 'online') {
                $q->where('last_seen', '>=', now()->subMinute());
            } elseif ($status === 'offline') {
                $q->where(function ($qq) {
                    $qq->whereNull('last_seen')
                       ->orWhere('last_seen', '<', now()->subMinute());
                });
            }
        })

               // 📅 FILTER TANGGAL BERGABUNG
        ->when($date, function ($q) use ($date) {
            match ($date) {
                'today' => $q->whereDate('created_at', today()),
                'week'  => $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
                'month' => $q->whereMonth('created_at', now()->month),
                'year'  => $q->whereYear('created_at', now()->year),
                default => null,
            };
        })


              ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('admin.pages.manajemen-user.list', compact(
        'data_user',
        'keyword',
        'level',
        'status',
        'date'
    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.manajemen-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
        //  dd($request->all());

    $request->validate([
        'name' => 'required|min:3|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'level' => 'required|in:admin,petugas,user',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'alamat' => 'nullable|string',
        'nomor_hp' => 'nullable|string|max:20',
    ], [
        'name.required' => 'Nama wajib diisi!',
        'name.min' => 'Nama minimal 3 karakter!',
        'name.max' => 'Nama maksimal 100 karakter!',
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid!',
        'email.unique' => 'Email sudah digunakan!',
        'password.required' => 'Password wajib diisi!',
        'password.min' => 'Password minimal 6 karakter!',
        'level.required' => 'Level user wajib dipilih!',
        'level.in' => 'Level user tidak valid!',
        'foto.image' => 'File harus berupa gambar!',
        'foto.mimes' => 'Format foto harus jpeg, png, atau jpg!',
        'foto.max' => 'Ukuran foto maksimal 2MB!',
        'nomor_hp.max' => 'Nomor HP maksimal 20 karakter!',
    ]);


    // UPLOAD IMAGE
   $imagePath = null;
    if ($request->hasFile('foto')) {
        $imagePath = $request->file('foto')->store('users', 'public');
    }


// SIMPAN KE DATABASE
    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => $request->password, // auto hash (casts)
        'level'    => $request->level,
         'foto' => $imagePath,
        'alamat'   => $request->alamat,
        'nomor_hp' => $request->nomor_hp,

            //UNTUK OTOMATIS VERFIKASI EMAIL
'email_verified_at' => now(),
    ]);



    // LOG AKTIVITAS
    ActivityLog::log('create', 'Menambahkan data user');

    return redirect()->route('admin.manajemenuser.list')
        ->with('swal', [
            'type'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data user berhasil ditambahkan',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          // untuk memngabil data  nya
        $data_user = User::findOrFail($id);

        return view('admin.pages.manajemen-user.detail', compact('data_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
    {
                  $data_user = User::findOrFail($id);

           return view('admin.pages.manajemen-user.edit', compact('data_user'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, string $id)
{
$request->validate([
    'name' => 'required|min:3|max:100',
    'email' => 'required|email|unique:users,email,' . $id,
    'password' => 'nullable|min:6|confirmed',
     'level' => 'required|in:admin,petugas,user',
     'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
     'alamat' => 'nullable|string',
      'nomor_hp' => 'nullable|string|max:20',
    ],
     [ 'name.required' => 'Nama wajib diisi!',
      'name.min' => 'Nama minimal 3 karakter!',
       'name.max' => 'Nama maksimal 100 karakter!',
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid!',
         'email.unique' => 'Email sudah digunakan!',
          'password.min' => 'Password minimal 6 karakter!',
           'level.required' => 'Level user wajib dipilih!',
            'level.in' => 'Level user tidak valid!',
             'foto.image' => 'File harus berupa gambar!',
             'foto.mimes' => 'Format foto harus jpeg, png, atau jpg!',
              'foto.max' => 'Ukuran foto maksimal 2MB!',
              'nomor_hp.max' => 'Nomor HP maksimal 20 karakter!', ]);

    $data_user = User::findOrFail($id);

    // ================= FOTO =================
    if ($request->hasFile('foto')) {
        if ($data_user->foto) {
            Storage::disk('public')->delete($data_user->foto);
        }
        $data_user->foto = $request->file('foto')->store('users', 'public');
    }

    // ================= PASSWORD =================
    if ($request->filled('password')) {
        $data_user->password = $request->password;
    }

    // ================= EMAIL =================
    $oldEmail = $data_user->email;
    if ($oldEmail !== $request->email) {
        $data_user->email = $request->email;
        $data_user->email_verified_at = now(); // otomatis verifikasi
    }

    // ================= DATA LAIN =================
    $data_user->name = $request->name;
    $data_user->level = $request->level;
    $data_user->alamat = $request->alamat;
    $data_user->nomor_hp = $request->nomor_hp;

    $data_user->save();

    ActivityLog::log('update', 'Mengupdate data user');

    return redirect()->route('admin.manajemenuser.list')->with('swal', [
        'type' => 'success',
        'title' => 'Berhasil!',
        'text' => 'Data user berhasil diperbarui',
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                    // panggil model berdasrkan id
          $data_user = User::findOrFail($id);


        // hapus foto

if ($data_user->foto && Storage::disk('public')->exists($data_user->foto)) {

    // Maka hapus file gambarnya
    Storage::disk('public')->delete($data_user->foto);
}
ActivityLog::log('delete', 'Menghapus data  user');

        $data_user->delete();

   return back()->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Data User  Berhasil Di hapus.',
        ]);
    }

}