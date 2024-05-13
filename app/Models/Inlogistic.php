<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inlogistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_logistik_masuk',
        'id_suppliers',
        'id_logistics',
        'jumlah_masuk',
        'tanggal_masuk',
        'expayer_logistik',
        'dokumentasi_masuk',
    ];
}
