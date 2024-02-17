<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_keluars extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [        
        'no_surat',
        'kode_surat_keluar',
        'sekolah',
        'kode_kab',
        'tujuan',
        'tanggal_surat',
        'perihal',
        'file',
        'created_by',
    ];
    public $timestamps = true;
    public function getRouteKeyName()
    {
        return 'id';
    }
}
