<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rental;
use Illuminate\Http\Request;

class OrderApprovalController extends Controller
{
    /**
     * INDEX - Menampilkan daftar peminjaman dengan pagination, search, filter,total statsitik card
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'details.tool', 'payment']);

        // SEARCH berdasarkan nama, email, nik, invoice, alat
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('invoice_number', 'like', "%{$search}%")
                  ->orWhereHas('details.tool', function($toolQuery) use ($search) {
                      $toolQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // FILTER STATUS
        if ($request->filled('status') && $request->status != 'Semua') {
            $statusMap = [
                'Disetujui' => 'approved',
                'Menunggu' => 'waiting_approval',
                'Ditolak' => 'rejected'
            ];
            $query->where('status', $statusMap[$request->status] ?? $request->status);
        }

        // FILTER PEMBAYARAN
        if ($request->filled('payment_status') && $request->payment_status != 'Semua') {
            $paymentMap = [
                'Lunas' => 'paid',
                'Belum Bayar' => 'pending',
                'Refund' => 'refund'
            ];
            $query->where('payment_status', $paymentMap[$request->payment_status] ?? $request->payment_status);
        }

        // FILTER PERIODE
        if ($request->filled('period') && $request->period != 'Semua') {
            $today = now()->startOfDay();
            switch ($request->period) {
                case 'Hari Ini':
                    $query->whereDate('created_at', $today);
                    break;
                case 'Minggu Ini':
                    $query->whereBetween('created_at', [$today->copy()->startOfWeek(), $today->copy()->endOfWeek()]);
                    break;
                case 'Bulan Ini':
                    $query->whereMonth('created_at', $today->month)
                          ->whereYear('created_at', $today->year);
                    break;
            }
        }

        // SORTING
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'Nama A-Z':
                    $query->orderBy('name', 'asc');
                    break;
                case 'Nama Z-A':
                    $query->orderBy('name', 'desc');
                    break;
                default: // Terbaru
                    $query->latest('created_at');
                    break;
            }
        } else {
            $query->latest('created_at');
        }

        // PAGINATION
        $orders = $query->paginate(10);

        // STATISTIK CARD NYA
        $stats = [
            'total' => Order::count(),
            'approved' => Order::where('status', 'approved')->count(),
            'pending' => Order::where('status', 'waiting_approval')->count(),
            'rejected' => Order::where('status', 'rejected')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
        ];

        return view('petugas.pages.peminjaman-petugas.list', compact('orders', 'stats'));
    }



    /**
     * DETAIL ORDER (untuk modal)
     */
    public function show(Order $order)
    {
$order->load(['user', 'details.tool', 'payment']);
        return response()->json($order);
    }


      /**
     * APPROVE ORDER
     */
    public function approve($id)
    {
        $order = Order::findOrFail($id);

        // ❗ pastikan sudah dibayar
        if ($order->payment_status !== 'paid') {
            return back()->with('error', 'Order belum dibayar');
        }

        // ❗ pastikan belum diproses
        if ($order->status !== 'waiting_approval') {
            return back()->with('error', 'Order sudah diproses');
        }

        // ✅ update status order
        $order->update([
            'status' => 'approved'
        ]);

        // ✅ buat rental (PEMINJAMAN DIMULAI)
        Rental::create([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'status' => 'dipinjam',
            'start_date' => $order->start_date,
            'end_date' => $order->end_date,
        ]);

        // 🔻 kurangi stok (optional, kalau sudah ada relasi detail)
        foreach ($order->details as $detail) {
            $detail->tool->decrement('stock', $detail->quantity);
        }

return redirect()->route('halaman-list-peminjaman')
    ->with('swal', [
        'type' => 'success',
        'title' => 'Berhasil!',
        'text' => 'Peminjaman disetujui'
    ]);
        }


            /**
     *  REJECT ORDER
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string'
        ]);

        $order = Order::findOrFail($id);

        // update status + alasan
        $order->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason
        ]);

return redirect()->route('halaman-list-peminjaman')
    ->with('swal', [
        'type' => 'success',
        'title' => 'Berhasil!',
        'text' => 'Peminjaman ditolak'
    ]); 
     }
}
