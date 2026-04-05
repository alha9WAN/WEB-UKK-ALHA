<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
        protected $fillable = [
        'user_id',
        'title',
        'message',
        'type',
        'is_read',
        'link',
        'data'
    ];
 // biar JSON otomatis jadi array
    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    // notif milik 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER FUNCTION (WAJIB 🔥)
    |--------------------------------------------------------------------------
    */

    // kirim notif
    public static function send($userId, $title, $message, $type = 'info', $link = null, $data = [])
    {
        return self::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'link' => $link,
            'data' => $data,
        ]);
    }

    // tandai sudah dibaca
    public function markAsRead()
    {
        $this->update([
            'is_read' => true
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | QUERY SCOPE (BIAR CLEAN 🔥)
    |--------------------------------------------------------------------------
    */

    // notif belum dibaca
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // notif terbaru
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}