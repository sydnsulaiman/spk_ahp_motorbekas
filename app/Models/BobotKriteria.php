<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class BobotKriteria extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_perhitungan',
        'id_kriteria',
        'id_kriteria_tujuan',
        'bobot_kriteria',
        'bobot_kriteria2',
        'total',
    ];
}
