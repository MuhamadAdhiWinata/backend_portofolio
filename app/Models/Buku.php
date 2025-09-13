<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $fillable = ['kategori_id', 'nama', 'penulis', 'tahun', 'harga'];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class);
    }
}
