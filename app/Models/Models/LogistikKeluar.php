<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistikKeluar extends Model
{
    use HasFactory;

    protected $table = 'logistik_keluar';

    protected $primaryKey = 'kode_logistik';

    protected $fillable = [
        'nama_logistik',
        'nama_penerima',
        'nik_kk_penerima',
        'alamat_penerima',
        'keterangan_keluar',
        'jumlah_keluar',
        'satuan_keluar',
        'dokumentasi',
    ];
    protected $dates = ['tanggal_keluar'];

    public $timestamps = true;
}