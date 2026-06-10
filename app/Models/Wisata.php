<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas';

    protected $fillable = [
        'nama_wisata',
        'kategori',
        'kabupaten',
        'deskripsi',
        'gambar',
        'link_maps',
    ];
}