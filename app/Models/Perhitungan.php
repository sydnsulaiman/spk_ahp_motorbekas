<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'nama_user',
        'total_eigen',
        'ratio_index',
        'consistency_ratio',
    ];
}
