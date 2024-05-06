<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikMasuk extends Model
{
    use HasFactory;

    protected $table = 'logistik_masuk';

    protected $primaryKey = 'kode_logistik';

    protected $fillable = [
        'nama_logistik',
        'nama_supplier',
        'tanggal_terima',
        'jumlah_terima',
        'satuan_terima',
        'expayer',
    ];

    protected $dates = ['tanggal_terima', 'expayer'];

    public $timestamps = true;
}
