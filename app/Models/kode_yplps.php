<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class kode_yplps extends Model
{
    use HasFactory;//, Sluggable;

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
    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}