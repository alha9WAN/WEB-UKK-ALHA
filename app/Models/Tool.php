<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table = 'tools';

    protected $fillable = [
        'kategori_id',
        'code',
        'name',
        'price',
        'stock',
        'condition',
        'features',
        'description',
        'image',
        'status',
    ];


  // Akses fitur dalam bentuk array (otomatis decode JSON)
    protected $casts = [
        'features' => 'array',
    ];

    // RELASI: alat  milik satu kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
