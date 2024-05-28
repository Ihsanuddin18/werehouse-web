<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticsRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_anggota',
        'list_logistik',
        'lokasi_pengiriman',
        'is_approved',
    ];
}
