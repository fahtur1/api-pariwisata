<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'nama_wisata',
        'alamat',
        'gambar',
        'coordinates'
    ];

    protected $hidden = [
        'id_location'
    ];

    protected $casts = [
        'coordinates' => 'array'
    ];

    protected $primaryKey = 'id_location';

    protected $table = 'locations';

    public $timestamps = false;
}
