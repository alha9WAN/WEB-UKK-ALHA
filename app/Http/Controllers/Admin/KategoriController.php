<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $search = $request->keyword;

    $data_kategori = Kategori::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('id', 'like', "%{$search}%");
    })->paginate(10);

// biar search tidak hilang saat pindah halaman
   $data_kategori->appends($request->all());


    return view('admin.pages.kategori-alat.list', compact('data_kategori'));


}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('admin.pages.kategori-alat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Validasi
$request->validate(
    [
        'name'        => 'required|min:3|max:100',
        'description' => 'required',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ],
    [
        // NAME
        'name.required' => 'Nama kategori wajib diisi.',
        'name.min'      => 'Nama kategori minimal 3 karakter.',
        'name.max'      => 'Nama kategori maksimal 100 karakter.',

        // DESCRIPTION
        'description.required' => 'Deskripsi kategori wajib diisi.',

        // IMAGE
        'image.image' => 'File harus berupa gambar.',
        'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau gif.',
        'image.max'   => 'Ukuran gambar maksimal 2 MB.',
    ]
);

// UNTUK MENYINPAAN FOTO
    $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }


                // MASUKAN KE DATA BASE
                Kategori::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);



          // TAMABAHAKN DISINI LOG AKTIVITAS
ActivityLog::log('create', 'Menambahkan data kategori alat');

   return redirect()->route('admin.kategori.list')
        ->with('swal', [
            'type' => 'success',
            'title' => ' Berhasil!',
            'text' => 'Data Berhasil DiTambahkan'
        ]);
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
    public function edit(string $id)
    {
                  $kategori = Kategori::findOrFail($id);

           return view('admin.pages.kategori-alat.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                //  Validasi
$request->validate(
    [
        'name'        => 'required|min:3|max:100',
        'description' => 'required',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ],
    [
        // NAME
        'name.required' => 'Nama kategori wajib diisi.',
        'name.min'      => 'Nama kategori minimal 3 karakter.',
        'name.max'      => 'Nama kategori maksimal 100 karakter.',

        // DESCRIPTION
        'description.required' => 'Deskripsi kategori wajib diisi.',

        // IMAGE
        'image.image' => 'File harus berupa gambar.',
        'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau gif.',
        'image.max'   => 'Ukuran gambar maksimal 2 MB.',
    ]
);


// ambil data seusi id
        $kategori = Kategori::findOrFail($id);



// cek apakah user menginput foto baru
if ($request->hasFile('image')) {
    // Hapus gambar lama jika ada
    if ($kategori->image) {
        Storage::disk('public')->delete($kategori->image);
    }
    $kategori->image = $request->file('image')->store('categories', 'public');
}

            $kategori->name = $request->name;
        $kategori->description = $request->description;
    // MENYINPAN DATA NYA
    $kategori->save();


      // TAMABAHAKN DISINI LOG AKTIVITAS
ActivityLog::log('update', 'Mengupdate data kategori alat');

  return redirect()->route('admin.kategori.list')
        ->with('swal', [
            'type' => 'success',
            'title' => ' Berhasil!',
            'text' => 'Data Berhasil DiUpdate'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // panggil model berdasrkan id
          $kategori = Kategori::findOrFail($id);


        // hapus foto

// Jika kategori punya nama file gambar
// DAN file tersebut ada di storage/app/public
if ($kategori->image && Storage::disk('public')->exists($kategori->image)) {

    // Maka hapus file gambarnya
    Storage::disk('public')->delete($kategori->image);
}
ActivityLog::log('delete', 'Menghapus data kategori alat');

        $kategori->delete();

   return back()->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Data Kategori Berhasil Di hapus.',
        ]);
    }
}
