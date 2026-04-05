<?php

namespace App\Models;

// untuk fitur verifikasi email
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// untuk soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

// untuk fitur verifikasi email
class User extends Authenticatable implements MustVerifyEmail
{

    // ada softdelte nya
    use HasFactory, Notifiable, SoftDeletes;

  protected $fillable = [
    'name',
    'email',
    'password',
    'level',
    'foto',
    'alamat',
    'nomor_hp',
    'email_verified_at', // WAJIB DITAMBAHKAN KETIKA CRUD MANAJEMEN USER
    // tambahkan ini
      'last_seen',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // ini
            'last_seen' => 'datetime',
        ];
    }


// RELASI KE FITUR LOG AKTIVITAS (1 USER BISA MEMILIKI BANYAK AKTIVITAS)
public function activityLogs()
{
    return $this->hasMany(ActivityLog::class);
}

// RELASI KE ORDER (1 USER BISA MEMILIKI BANYAK ORDER)
public function orders()
{
    return $this->hasMany(Order::class);
}


// RELASI KE RENTAL
public function rentals()
{
    return $this->hasMany(Rental::class);
}


// RELASI KE NOTIFIKASI
public function notifications()
{
    return $this->hasMany(Notification::class);
}
}
