<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    public $fillable=[
        'tanggal',
        'jenis_mutasi',
        'jumlah',
        'user_id',
        'barang_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class); 
    }
}
