<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil notif petugas
        $notifications = auth()->user()
            ->notifications()
            ->latestFirst()
            ->take(10)
            ->get();

        // hitung notif belum dibaca
        $count = auth()->user()
            ->notifications()
            ->unread()
            ->count();

        return view('petugas.pages.dashboard', compact('notifications', 'count'));
    }
}
