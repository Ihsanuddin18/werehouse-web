<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSupplier extends Model
{
    use HasFactory;

    protected $table = 'data_supplier';
    
    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier', 
        'email_supplier', 
        'telepon_supplier', 
        'instansi_supplier',
    ];
}

