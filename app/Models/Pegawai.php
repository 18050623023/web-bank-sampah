<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id',
        'nama_pegawai',
        'tempat_lahir',
        'tgl_lahir',
        'no_hp',
        'alamat'
    ];
}
