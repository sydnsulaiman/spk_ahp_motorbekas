<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Showroom extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guard = 'showroom';
    public $timestamps = true;
    public $incrementing = true;
    public $fillable = [
        'nama_showroom',
        'nama_pic',
        'email',
        'password',
        'tahun_berdiri',
        'alamat',
        'no_hp',
        'gambar'
    ];

}
