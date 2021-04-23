<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adopsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'alasan',
        'donasi_id',
        'user_id',
        'st',
    ];
}
