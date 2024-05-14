<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inlogistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_logistik_masuk',
        'satuan_logistik_masuk',
        'jumlah_logistik_masuk',
        'nama_supplier',
        'tanggal_masuk',
        'expayer_logistik',
        'keterangan_masuk',
    ];
}
