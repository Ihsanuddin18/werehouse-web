<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Logistic;

class Inlogistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_logistik_masuk',
        'id_logistik',
        'satuan_logistik_masuk',
        'jumlah_logistik_masuk',
        'nama_supplier',
        'tanggal_masuk',
        'expayer_logistik',
        'keterangan_masuk',
    ];

    public function logistic()
    {
        return $this->belongsTo(Logistic::class, 'id_logistik', 'id');
    }
}
