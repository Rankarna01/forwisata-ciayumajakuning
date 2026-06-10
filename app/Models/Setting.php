<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sistem', 'logo', 'email', 'no_telp', 'alamat', 
        'deskripsi_footer', 'link_facebook', 'link_instagram', 'link_youtube'
    ];
}