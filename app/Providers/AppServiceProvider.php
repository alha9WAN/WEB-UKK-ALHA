<?php

namespace App\Providers;
use Midtrans\Config;
use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //DAFTARKAN MINDTRANS DISINI
           Config::$serverKey = config('midtrans.server_key');
        //TAMBAH INI
            Config::$clientKey = config('midtrans.client_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');

    // TAMBAHKAN DISINI UNTUK NOTIFIKASI
      View::composer('*', function ($view) {
        if (auth()->check()) {
            $count = auth()->user()
                ->notifications()
                ->unread()
                ->count();

            $view->with('count', $count);
        }
    });
    
    }





}
