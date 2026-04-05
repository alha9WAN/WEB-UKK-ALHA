<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckLevel;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // disini
    ->withMiddleware(function (Middleware $middleware): void {


    // TAMBAHKAN UNTUK CSRF MADELWARE MMINDTRANS
   // 🔥 TAMBAHKAN INI (WAJIB)
    $middleware->appendToGroup('web', [
        \App\Http\Middleware\VerifyCsrfToken::class,
    ]);

    // DISINI
   // 🔥 LAST SEEN GLOBAL UNTUK SEMUA WEB REQUEST
   $middleware->appendToGroup('web', [
       \App\Http\Middleware\UpdateLastSeen::class,
   ]);



   // ALIAS MIDDLEWARE
        $middleware->alias([
            'checklevel' => CheckLevel::class,
            'verified'   => EnsureEmailIsVerified::class,
          ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();