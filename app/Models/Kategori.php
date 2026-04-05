<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /**
     * Otomatis membuat slug saat menyimpan data
     */


    // UNTUK SLUG NYA
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->name);
        });
    }


    // relasi ke alat(tool) 1 kategory memiliki banyak alat
    public function tools()
{
    return $this->hasMany(Tool::class);
}

}
