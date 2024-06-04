<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_nama_logistik_keluar', 
        'request_jumlah_logistik_keluar', 
        'alamat_penerima_logistik',
        'keterangan_penerima_logistik',
        'tanggal_kejadian_bencana',
    ];
}
