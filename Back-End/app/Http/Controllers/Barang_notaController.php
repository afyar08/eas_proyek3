<?php

// File: app/Http/Controllers/BarangNotaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangNota;

class BarangNotaController extends Controller
{
    // Mendapatkan semua data barang_nota
    public function index()
    {
        $barangNota = BarangNota::all();
        return response()->json(['data' => $barangNota]);
    }

    // Mendapatkan data barang_nota berdasarkan KodeNota
    public function show($kodeNota)
    {
        $barangNota = BarangNota::where('KodeNota', $kodeNota)->get();

        if ($barangNota->isEmpty()) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        return response()->json(['data' => $barangNota]);
    }

    // Menyimpan data barang_nota baru
    public function store(Request $request)
    {
        $request->validate([
            'KodeNota' => 'required',
            'KodeBarang' => 'required',
            'JumlahBarang' => 'required',
            'HargaSatuan' => 'required',
            'Jumlah' => 'required',
        ]);

        $barangNota = BarangNota::create($request->all());

        return response()->json(['data' => $barangNota], 201);
    }

    // Memperbarui data barang_nota berdasarkan KodeNota dan KodeBarang
    public function update(Request $request, $kodeNota, $kodeBarang)
    {
        $barangNota = BarangNota::where('KodeNota', $kodeNota)
            ->where('KodeBarang', $kodeBarang)
            ->first();

        if (!$barangNota) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        $request->validate([
            'JumlahBarang' => 'required',
            'HargaSatuan' => 'required',
            'Jumlah' => 'required',
        ]);

        $barangNota->update($request->all());

        return response()->json(['data' => $barangNota]);
    }

    // Menghapus data barang_nota berdasarkan KodeNota dan KodeBarang
    public function destroy($kodeNota, $kodeBarang)
    {
        $barangNota = BarangNota::where('KodeNota', $kodeNota)
            ->where('KodeBarang', $kodeBarang)
            ->first();

        if (!$barangNota) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        $barangNota->delete();

        return response()->json(['message' => 'BarangNota deleted']);
    }
}