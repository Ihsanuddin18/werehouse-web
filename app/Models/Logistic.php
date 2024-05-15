<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_logistik',
        'nama_logistik',
        'satuan_logistik',
    ];
}
