<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'jenis',
        'lokasi',
        'gambar',
        'alasan',
        'st',
    ];
}
