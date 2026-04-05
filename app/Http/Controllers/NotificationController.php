<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // 🔔 ambil notif (AJAX)
    public function latest()
    {
        $notifications = auth()->user()
            ->notifications()
            ->latestFirst()
            ->take(10)
            ->get();

        $count = auth()->user()
            ->notifications()
            ->unread()
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'count' => $count
        ]);
    }

    // ✅ tandai 1 notif dibaca
    public function read($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->markAsRead();

        return response()->json(['success' => true]);
    }

    // ✅ tandai semua dibaca
    public function readAll()
    {
        auth()->user()
            ->notifications()
            ->unread()
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

}
