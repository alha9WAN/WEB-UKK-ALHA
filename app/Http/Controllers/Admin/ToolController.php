<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Kategori;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
        $kategories = Kategori::orderBy('name')->get();

        $tools = Tool::query()

            //  SEARCH
        ->when($request->filled('keyword'), function ($q) use ($request) {
            $q->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('code', 'like', '%' . $request->keyword . '%')
                      ->orWhere('price', 'like', '%' . $request->keyword . '%');
            });
        })

             //  FILTER KATEGORI
        ->when($request->filled('kategory'), function ($q) use ($request) {
            $q->where('kategori_id', $request->kategory);
        })


        //  FILTER STOK
        ->when($request->filled('stock'), function ($q) use ($request) {
            match ($request->stock) {
                'in-stock' =>
                    $q->where('stock', '>', 10),

                'low-stock' =>
                    $q->whereBetween('stock', [1, 10]),

                'out-of-stock' =>
                    $q->where('stock', 0),
            };
        })



        //  SORTING
        ->when($request->filled('sort'), function ($q) use ($request) {
            match ($request->sort) {
                'price_asc'  => $q->orderBy('price', 'asc'),
                'price_desc' => $q->orderBy('price', 'desc'),
                'name_asc'   => $q->orderBy('name', 'asc'),
                'name_desc'  => $q->orderBy('name', 'desc'),
                'date_new'   => $q->latest(),
                'date_old'   => $q->oldest(),
            };
        }, fn ($q) => $q->latest())

                ->paginate(10)
        ->withQueryString();


        // CRAD TOTAL
        // TOTAL ALAT
$totalAlat      = Tool::count();
// TOTAL STOK TERSEDIA
$alatTersedia   = Tool::where('stock', '>', 10)->count();
// TOTAL STOK MENINIPIS
$stokMenipis    = Tool::whereBetween('stock', [1, 10])->count();
// TOTAL STOK HABIS
$stokHabis      = Tool::where('stock', 0)->count();

    return view('admin.pages.alat-pertukangan.list', compact(
        'tools',
        'kategories',
        'totalAlat',
        'alatTersedia',
        'stokMenipis',
        'stokHabis'
    ));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


          // KODE UNIK
    $year = now()->year;

    $last = \App\Models\Tool::whereYear('created_at', $year)
                ->orderBy('id', 'desc')
                ->first();

    $number = 1;

    if ($last && preg_match('/ALAT-(\d+)-'.$year.'/', $last->code, $match)) {
        $number = (int) $match[1] + 1;
    }

    $previewCode = 'ALAT-' . str_pad($number, 3, '0', STR_PAD_LEFT) . '-' . $year;


        $kategories = Kategori::all();
 return view('admin.pages.alat-pertukangan.create',compact('kategories','previewCode'));


    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{

    //  dd($request->all());
  $request->validate(
    [
        'kategori_id' => 'required|exists:kategoris,id',
        'code'        => 'required|unique:tools,code',
        'name'        => 'required|min:3|max:100',
        'price'       => 'required|integer|min:0',
        'stock'       => 'required|integer|min:0',
        'features' => 'nullable|string',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ],
    [
        // KATEGORI
        'kategori_id.required' => 'Kategori wajib dipilih.',
        'kategori_id.exists'   => 'Kategori yang dipilih tidak valid.',

        // CODE
        'code.required' => 'Kode alat wajib diisi.',
        'code.unique'   => 'Kode alat sudah digunakan.',

        // NAME
        'name.required' => 'Nama alat wajib diisi.',
        'name.min'      => 'Nama alat minimal 3 karakter.',
        'name.max'      => 'Nama alat maksimal 100 karakter.',

        // PRICE
        'price.required' => 'Harga wajib diisi.',
        'price.integer'  => 'Harga harus berupa angka.',
        'price.min'      => 'Harga tidak boleh kurang dari 0.',

        // STOCK
        'stock.required' => 'Stok wajib diisi.',
        'stock.integer'  => 'Stok harus berupa angka.',
        'stock.min'      => 'Stok tidak boleh kurang dari 0.',

        // FEATURES
'features.string' => 'Fitur harus berupa teks.',
        // DESCRIPTION
        'description.string' => 'Deskripsi harus berupa teks.',

        // IMAGE
        'image.image' => 'File harus berupa gambar.',
        'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau gif.',
        'image.max'   => 'Ukuran gambar maksimal 2 MB.',
    ]
);


    // UPLOAD IMAGE
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('tools', 'public');
    }

    // TAMBAH INI UNTUK FITUR

$features = null;

if ($request->filled('features')) {
    $features = array_map(
        'trim',
        explode(',', $request->features)
    );
}



    // SIMPAN KE DATABASE
    Tool::create([
        'kategori_id' => $request->kategori_id,
        'code'        => $request->code,
        'name'        => $request->name,
        'price'       => $request->price,
        'stock'       => $request->stock,
         'features'    => $features, // ← INI PENTING MEMANGGIL KODE YANG DITAS
        'description' => $request->description,
        'image'       => $imagePath,
        // condition ❌ tidak diisi
        // status ❌ tidak diisi
    ]);






    // LOG AKTIVITAS
    ActivityLog::log('create', 'Menambahkan data alat');

    return redirect()->route('admin.alat.list')
        ->with('swal', [
            'type'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data alat berhasil ditambahkan',
        ]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $tools = Tool::with(['kategori'])->findOrFail($id);


        return view('admin.pages.alat-pertukangan.detail', compact('tools'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //untuk mengambil data kategry
        $kategoris = Kategori::all();


        // untuk memngabil data alat nya
        $tools = Tool::findOrFail($id);

        return view('admin.pages.alat-pertukangan.edit', compact('tools', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
    $request->validate(
        [
            'kategori_id' => 'required|exists:kategoris,id',
            'code'        => 'required|unique:tools,code,' . $id,
            'name'        => 'required|min:3|max:100',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'features'    => 'nullable|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ],
        [
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists'   => 'Kategori yang dipilih tidak valid.',
            'code.required'        => 'Kode alat wajib diisi.',
            'code.unique'          => 'Kode alat sudah digunakan.',
            'name.required'        => 'Nama alat wajib diisi.',
            'name.min'             => 'Nama alat minimal 3 karakter.',
            'name.max'             => 'Nama alat maksimal 100 karakter.',
            'price.required'       => 'Harga wajib diisi.',
            'stock.required'       => 'Stok wajib diisi.',
            'image.image'          => 'File harus berupa gambar.',
        ]
    );

    // ambil data berdasarkan id
    $tools = Tool::findOrFail($id);

    // =====================
    // OLAH FEATURES (JSON)
    // =====================
    $features = null;
    if ($request->filled('features')) {
        $features = array_map('trim', explode(',', $request->features));
    }

    // =====================
    // OLAH IMAGE
    // =====================
    $imagePath = $tools->image;

    if ($request->hasFile('image')) {
        if ($tools->image) {
            Storage::disk('public')->delete($tools->image);
        }
        $imagePath = $request->file('image')->store('tools', 'public');
    }

    // =====================
    // UPDATE DATABASE
    // =====================
    $tools->update([
        'kategori_id' => $request->kategori_id,
        'code'        => $request->code,
        'name'        => $request->name,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'features'    => $features,
        'description' => $request->description,
        'image'       => $imagePath,
        // status ❌ tidak diubah
        // condition ❌ tidak diisi
    ]);

    // =====================
    // LOG AKTIVITAS
    // =====================
    ActivityLog::log('update', 'Mengupdate data alat');

    return redirect()->route('admin.alat.list')
        ->with('swal', [
            'type'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data alat berhasil diperbarui'
        ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                // panggil model berdasrkan id
          $tools = Tool::findOrFail($id);


        // hapus foto

// Jika kategori punya nama file gambar
// DAN file tersebut ada di storage/app/public
if ($tools->image && Storage::disk('public')->exists($tools->image)) {

    // Maka hapus file gambarnya
    Storage::disk('public')->delete($tools->image);
}
ActivityLog::log('delete', 'Menghapus data  alat');

        $tools->delete();

   return back()->with('swal', [
            'type' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Data Alat  Berhasil Di hapus.',
        ]);
    }

}
