<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class BobotSubkriteria extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_perhitungan',
        'id_kriteria',
        'id_subkriteria',
        'id_subkriteria_tujuan',
        'bobot_subkriteria',
        'bobot_subkriteria2',
        'total_subkriteria',
    ];
}
