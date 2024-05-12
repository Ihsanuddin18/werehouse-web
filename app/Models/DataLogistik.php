<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLogistik extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_logistik',
        'satuan_logistik',
        'qr_code_label',
    ];
}