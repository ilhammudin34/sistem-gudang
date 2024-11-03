<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Contoh Barang 1',
            'kategori' => 'Elektronik',
            'lokasi' => 'Gudang 1',
            'jumlah_barang' => 50,
        ]);

        Barang::create([
            'nama_barang' => 'Contoh Barang 2',
            'kategori' => 'Alat Tulis',
            'lokasi' => 'Gudang 2',
            'jumlah_barang' => 100,
        ]);
    }
}
