<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kode_surat_masuk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'ket',
    ];
    // Jika Anda tidak menggunakan timestamps (created_at dan updated_at), atur menjadi false
    public $timestamps = true;
    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'kode';
    }
}
