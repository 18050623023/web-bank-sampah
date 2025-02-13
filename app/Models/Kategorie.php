<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_sampah',
        'harga_pergram',
        'point',
        'ton'
    ];
}
