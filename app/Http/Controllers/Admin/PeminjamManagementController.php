<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class PeminjamManagementController extends Controller

{


public function index(Request $request)
{
    $query = Order::with('user');

 // 🔍 SEARCH
if ($request->search) {
    $query->where(function ($q) use ($request) {

        // 🔍 dari tabel orders
        $q->where('invoice_number', 'like', '%' . $request->search . '%')
          ->orWhere('nik', 'like', '%' . $request->search . '%');

        // 🔍 dari relasi user
        $q->orWhereHas('user', function ($q2) use ($request) {
            $q2->where('name', 'like', '%' . $request->search . '%')
               ->orWhere('email', 'like', '%' . $request->search . '%');
        });

    });
}

    // 📊 STATUS PEMINJAMAN
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // 💰 STATUS PEMBAYARAN
    if ($request->payment) {
        $query->where('payment_status', $request->payment);
    }

    // 📅 FILTER PERIODE
    if ($request->period == 'hari') {
        $query->whereDate('created_at', today());
    } elseif ($request->period == 'minggu') {
        $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    } elseif ($request->period == 'bulan') {
        $query->whereMonth('created_at', now()->month);
    } elseif ($request->period == 'tahun') {
        $query->whereYear('created_at', now()->year);
    }

    // 🔤 SORTING
    if ($request->sort == 'az') {
        $query->orderBy('name', 'asc');
    } elseif ($request->sort == 'za') {
        $query->orderBy('name', 'desc');
    } else {
        $query->latest();
    }

    $orders = $query->paginate(10)->withQueryString();

$total = Order::count();

$approved = Order::where('status', 'approved')->count();

$pending = Order::where('status', 'waiting_approval')->count(); // ✅ FIX

$rejected = Order::where('status', 'rejected')->count();

$selesai = Order::where('status', 'completed')->count();



    return view('admin.pages.peminjaman.list', compact(   'orders','total','approved','pending','rejected','selesai'));

}



public function show($id)
{
    $order = Order::with([
        'user',
        'details.tool',
        'payment'
    ])->findOrFail($id);

    return view('admin.pages.peminjaman.detail', compact('order'));
}
}
