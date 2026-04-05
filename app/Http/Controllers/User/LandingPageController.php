<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Tool;
use Illuminate\Http\Request;


class LandingPageController extends Controller
{
    public function index()
    {
        // Hitung jumlah alat per kategori
        $kategoris = Kategori::withCount('tools')->get();

        // Ambil 5 alat terbaru yang stok masih ada
        $tools = Tool::with('kategori')
                    ->where('stock', '>', 0)
                    ->latest()
                    ->take(5)
                    ->get();

        return view('user.pages.home', compact('kategoris', 'tools'));
    }


public function listAlat(Request $request)
{
    $query = Tool::with('kategori');

    // 🔍 SEARCH (nama, kode, harga)
    if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->keyword . '%')
              ->orWhere('code', 'like', '%' . $request->keyword . '%')
              ->orWhere('price', 'like', '%' . $request->keyword . '%');
        });
    }

    // 🏷️ FILTER KATEGORI
if ($request->filled('kategori') && $request->kategori != 'all') {
    $query->where('kategori_id', $request->kategori);
}

 

// 💰 FILTER HARGA
if ($request->filled('price') && $request->price != 'all') {

    if ($request->price == '200000') {

        $query->where('price', '>=', 200000);

    } else {

        [$min, $max] = explode('-', $request->price);

        $query->whereBetween('price', [$min, $max]);

    }
}

// 🔃 SORT
if ($request->filled('sort')) {
    switch ($request->sort) {
        case 'price-low':
            $query->orderBy('price', 'asc');
            break;

        case 'price-high':
            $query->orderBy('price', 'desc');
            break;

        case 'newest':
            $query->orderBy('created_at', 'desc');
            break;

        case 'old':
            $query->orderBy('created_at', 'asc');
            break;

        default:
            $query->latest();
    }
} else {
    $query->latest();
}

    // 📦 PAGINATION
    $tools = $query->paginate(10)->withQueryString();
    $kategories = Kategori::all();

    return view('user.pages.list', compact('tools', 'kategories'));
}


   public function detailAlat(string $id)
    {

        $tools = Tool::with(['kategori'])->findOrFail($id);


        return view('user.pages.detail-alat', compact('tools'));



}
}
