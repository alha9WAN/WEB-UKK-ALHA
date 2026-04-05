<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
   /**
    * Menampilkan daftar log aktivitas
    * Hanya bisa diakses oleh admin
    */
public function index(Request $request)
{
    $search = $request->keyword;

    // 1️⃣ QUERY DASAR
    $log_aktivitas = ActivityLog::with('user');

    // 2️⃣ SEARCH
    if ($search) {
        $log_aktivitas->where(function ($q) use ($search) {
            $q->where('description', 'like', "%{$search}%")
              ->orWhere('activity_type', 'like', "%{$search}%")
              ->orWhere('role', 'like', "%{$search}%")
              ->orWhereHas('user', function ($u) use ($search) {
                  $u->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
              });
        });
    }

    // 3️⃣ FILTER JENIS AKTIVITAS
    if ($request->filled('activity_type')) {
        $log_aktivitas->where('activity_type', $request->activity_type);
    }

    // 4️⃣ FILTER ROLE
    if ($request->filled('role')) {
        $log_aktivitas->where('role', $request->role);
    }

    // 5️⃣ FILTER TANGGAL
    if ($request->filled('date')) {
        match ($request->date) {
            'today' => $log_aktivitas->whereDate('created_at', Carbon::today()),
            'week'  => $log_aktivitas->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]),
            'month' => $log_aktivitas->whereMonth('created_at', Carbon::now()->month)
                                     ->whereYear('created_at', Carbon::now()->year),
            'year'  => $log_aktivitas->whereYear('created_at', Carbon::now()->year),
            default => null
        };
    }

    // 6️⃣ EXECUTE QUERY (WAJIB DISIMPAN)
    $log_aktivitas = $log_aktivitas
        ->latest()
        ->paginate(30)
        ->withQueryString();

    // 7️⃣ TOTAL CARD
    $totalAktivitas = ActivityLog::count();
    $totalCreate   = ActivityLog::where('activity_type', 'create')->count();
    $totalUpdate   = ActivityLog::where('activity_type', 'update')->count();
    $totalDelete   = ActivityLog::where('activity_type', 'delete')->count();

    return view('admin.pages.ActivityLog.ActivityLog', compact(
        'log_aktivitas',
        'totalAktivitas',
        'totalCreate',
        'totalUpdate',
        'totalDelete'
    ));
}


}