<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $fillable=[
        'nama_barang',
        'kategori',
        'lokasi',
        'jumlah_barang',
    ];
}
