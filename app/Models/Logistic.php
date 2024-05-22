<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inlogistic;
use App\Models\Outlogistic;

class Logistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_logistik',
        'nama_logistik',
        'satuan_logistik',
    ];
    public function inlogistics()
    {
        return $this->hasMany(Inlogistic::class, 'id_logistik', 'id');
    }
    public function outlogistics()
    {
        return $this->hasMany(Outlogistic::class, 'id_logistik', 'id');
    }
}
