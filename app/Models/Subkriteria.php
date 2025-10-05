<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_kriteria',
        'nama_subkriteria',
        'kode_subkriteria',
        'operator',
        'nilai_pembanding',
        'satuan',
    ];
}
