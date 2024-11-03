<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Barang;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        return Mutasi::all();
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'barang_id' => 'required|exists:barangs,id',
    //         'user_id' => 'required|exists:users,id',
    //         'tanggal' => 'required|date',
    //         'jenis_mutasi' => 'required|string',
    //         'jumlah' => 'required|integer',
    //     ]);

    //     return Mutasi::create($request->all());
    // }
    public function store(Request $request)
    {
        $request->validate([
            'jenis_mutasi' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jenis_mutasi === 'penambahan') {
            // Menambahkan jumlah barang
            $barang->jumlah_barang += $request->jumlah;
        } elseif ($request->jenis_mutasi === 'pengurangan') {
            // Memastikan jumlah barang mencukupi untuk dikurangi
            if ($barang->jumlah_barang < $request->jumlah) {
                return response()->json([
                    'message' => 'Jumlah barang tidak mencukupi untuk pengurangan'
                ], 400);
            }
            // Mengurangi jumlah barang
            $barang->jumlah_barang -= $request->jumlah;
        } else {
            return response()->json([
                'message' => 'Jenis mutasi tidak valid'
            ], 400);
        }

        // Simpan perubahan pada jumlah_barang
        $barang->update();

        $mutasi = Mutasi::create(array_merge($request->all(), ['tanggal' => now()]));

        return response()->json([
            'message' => 'Mutasi berhasil ditambahkan',
            'data' => $mutasi
        ], 201);
    }

    public function show(Mutasi $mutasi)
    {
        return $mutasi;
    }

    public function update(Request $request, Mutasi $mutasi)
    {
        $request->validate([
            'barang_id' => 'exists:barangs,id',
            'user_id' => 'exists:users,id',
            'tanggal' => 'date',
            'jenis_mutasi' => 'string',
            'jumlah' => 'integer',
        ]);

        $mutasi->update($request->all());
        return $mutasi;
    }

    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();
        return response()->json([
            'message' => 'Mutasi berhasil dihapus'
        ]);
    }

    public function detailByBarang($barang_id)
    {
        $mutasis = Mutasi::where('barang_id', $barang_id)
                        ->with('user', 'barang')
                        ->get();

        if ($mutasis->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data mutasi untuk barang ini'
            ], 404);
        }

        return response()->json([
            'message' => 'Daftar mutasi berhasil ditemukan',
            'data' => $mutasis
        ]);
    }
    public function detailByUser($user_id)
    {
        $mutasis = Mutasi::where('user_id', $user_id)
                        ->with('barang')
                        ->get();

        if ($mutasis->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data mutasi yang dilakukan oleh user ini'
            ], 404);
        }

        return response()->json([
            'message' => 'Daftar mutasi berhasil ditemukan',
            'data' => $mutasis
        ]);
    }


}
