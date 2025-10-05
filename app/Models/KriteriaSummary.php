<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class KriteriaSummary extends Model
{
    use HasFactory, Uuid;
    public $timestamps = true;
    public $fillable = [
        'id_kriteria',
        'id_perhitungan',
        'prioritas',
        'eigen_value',
        'jumlah'
    ];
}
