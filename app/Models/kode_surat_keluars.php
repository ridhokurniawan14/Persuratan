<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kode_surat_keluars extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_surat_yplp',
        'nomor',
        'ket',
    ];
    public $timestamps = true;
    // public function getRouteKeyName()
    // {
    //     return 'nomor';
    // }
}
