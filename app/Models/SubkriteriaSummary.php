<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class SubkriteriaSummary extends Model
{
    use HasFactory, Uuid;
    public $timestamps = true;
    public $fillable = [
        'id_perhitungan',
        'id_kriteria',
        'id_subkriteria',
        'prioritas',
        'eigen_value',
        'jumlah',
        'total_eigen',
        'ratio_index',
        'cr',
    ];
}
