<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'activity_type',
        'description',
        'role',
    ];



    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'System'
        ]);
    }
    // Agar kode tidak berulang di controller dan pencatatan aktivitas lebih konsisten.
    public static function log($type, $description)
    {
        $user = auth()->user();

        self::create([
            'user_id' => $user?->id,
            'activity_type' => $type,
            'description' => $description,
            'role' => $user?->level ?? 'system',
        ]);
    }
}
