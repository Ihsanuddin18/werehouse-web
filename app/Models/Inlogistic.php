<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Logistic;
use App\Models\Supplier;

class Inlogistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_logistik',
        'id_supplier',
        'jumlah_logistik_masuk',
        'tanggal_masuk',
        'expayer_logistik',
        'keterangan_masuk',
    ];

    public function logistic()
    {
        return $this->belongsTo(Logistic::class, 'id_logistik', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }
}
