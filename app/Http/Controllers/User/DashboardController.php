<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Notification;


class DashboardController extends Controller
{
   public function index()
   {
       // ambil notif user login
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


          return view('user.pages.dashboard-user.dashboard', compact('notifications', 'count'));


   }
}
