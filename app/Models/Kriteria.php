<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'nama_kriteria',
        'kode_kriteria'
    ];
}
