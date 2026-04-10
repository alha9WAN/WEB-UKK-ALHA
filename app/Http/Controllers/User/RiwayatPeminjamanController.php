<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rental;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RiwayatPeminjamanController extends Controller
{
    public function index(Request $request)
    {

        $query = Order::with(['details.tool', 'user', 'rental'])
            ->where('user_id', auth()->id());

            /*
         |--------------------------------------------------------------------------
        | 🔍 SEARCH
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                // Cari berdasarkan ID Order
                if (is_numeric($search)) {
                    $q->where('id', $search);
                }

                // Cari berdasarkan invoice_number
                $q->orWhere('invoice_number', 'like', "%{$search}%");

                // Cari berdasarkan nama alat (via relasi details.tool)
                $q->orWhereHas('details.tool', function ($t) use ($search) {
                    $t->where('name', 'like', "%{$search}%");
                });
            });
        }


         /*
        |--------------------------------------------------------------------------
        | 🎯 FILTER STATUS
        |--------------------------------------------------------------------------
        */
        if ($request->filled('status')) {
            switch ($request->status) {
                // 🔵 ORDER STATUS - LANGSUNG WHERE STATUS
                case 'approved':
                case 'waiting_approval':
                case 'rejected':
                    $query->where('status', $request->status);
                    break;

                // 🟢 AKTIF (order approved DAN rental status dipinjam DAN belum lewat)
                case 'aktif':
                    $query->where('status', 'approved')
                          ->whereHas('rental', function ($r) {
                              $r->where('status', 'dipinjam')
                                ->whereDate('end_date', '>=', now());
                          });
                    break;

                // 🔴 TERLAMBAT
                case 'terlambat':
                    $query->where('status', 'approved')
                          ->whereHas('rental', function ($r) {
                              $r->where('status', 'dipinjam')
                                ->whereDate('end_date', '<', now());
                          });
                    break;

                // ✅ SELESAI
                case 'selesai':
                    $query->where('status', 'approved')
                          ->whereHas('rental', function ($r) {
                              $r->where('status', 'dikembalikan');
                          });
                    break;
            }
        }

              /*
        |--------------------------------------------------------------------------
        | 📦 PAGINATION
        |--------------------------------------------------------------------------
        */
        // 🔥 PERBAIKAN: ganti $rentals jadi $orders
        $orders = $query->latest('id')
            ->paginate(10)
            ->withQueryString();

            /*
        |--------------------------------------------------------------------------
        | 📊 STATISTIK (FIX STATUS ORDER ⚠️)
        |--------------------------------------------------------------------------
        */
        $stats = [
            'total' => Rental::where('user_id', auth()->id())->count(),

            'approved' => Order::where('user_id', auth()->id())
                ->where('status', 'approved')
                ->count(),

            // ⚠️ FIX DI SINI
            'pending' => Order::where('user_id', auth()->id())
                ->where('status', 'waiting_approval')
                ->count(),

            'rejected' => Order::where('user_id', auth()->id())
                ->where('status', 'rejected')
                ->count(),
        ];

             return view(
            'user.pages.riwayat-peminjaman.list-peminjaman',
            compact('orders', 'stats')
        );
    }
}
