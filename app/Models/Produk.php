<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Produk extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'id_showroom',
        'nama_produk',
        'harga',
        'tahun_produksi',
        'teknologi',
        'kapasitas_mesin',
        'gambar'
    ];

}
