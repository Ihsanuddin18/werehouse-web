<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlogistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_logistik_keluar',
        'satuan_logistik_keluar',
        'jumlah_logistik_keluar',
        'tanggal_keluar',
        'nama_penerima',
        'nik_kk_penerima',
        'alamat_penerima',
        'keterangan_keluar',
    ];
}
