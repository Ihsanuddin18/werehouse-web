<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Logistic;
use App\Models\Inlogistic;
use App\Models\User;

class LogisticRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_logistik',
        'id_inlogistik',
        'id_user',
        'jumlah_logistik_request', 
        'tanggal_kejadian_request', 
        'nama_penerima_request',
        'nik_kk_request',
        'alamat_penerima_request',
        'keterangan_request',
    ];

    public function logistic()
    {
        return $this->belongsTo(Logistic::class, 'id_logistik', 'id');
    }
    
    public function inlogistic()
    {
        return $this->belongsTo(Inlogistic::class, 'id_inlogistik');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
