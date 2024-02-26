<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [        
        'no_surat',
        'kode_surat_masuk',
        'alamat_pengirim',
        'tanggal_surat',
        'nomor_surat',
        'perihal',
        'file',
        'created_by',
    ];
    public $timestamps = true;
    // public function getRouteKeyName()
    // {
    //     return 'nomor';
    // }
}
