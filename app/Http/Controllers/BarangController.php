<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return Barang::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'required|string',
            'jumlah_barang' => 'required|integer',
        ]);

        return Barang::create($request->all());
    }

    public function show(Barang $barang)
    {
        return $barang;
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'string',
            'kategori' => 'string',
            'lokasi' => 'string',
            'jumlah_barang' => 'integer',
        ]);

        $barang->update($request->all());
        return $barang;
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return response()->json([
            'message' => 'Barang berhasil dihapus'
        ]);
    }
}
