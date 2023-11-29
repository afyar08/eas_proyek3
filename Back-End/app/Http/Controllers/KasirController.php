<?php

// File: app/Http/Controllers/KasirController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    // Mendapatkan semua data kasir
    public function index()
    {
        $kasir = Kasir::all();
        return response()->json(['data' => $kasir]);
    }

    // Mendapatkan data kasir berdasarkan KodeKasir
    public function show($kodeKasir)
    {
        $kasir = Kasir::find($kodeKasir);

        if (!$kasir) {
            return response()->json(['message' => 'Kasir not found'], 404);
        }

        return response()->json(['data' => $kasir]);
    }

    // Menyimpan data kasir baru
    public function store(Request $request)
    {
        $request->validate([
            'KodeKasir' => 'required|unique:kasir,KodeKasir',
            'Nama' => 'required',
            'HP' => 'required',
        ]);

        $kasir = Kasir::create($request->all());

        return response()->json(['data' => $kasir], 201);
    }

    // Memperbarui data kasir berdasarkan KodeKasir
    public function update(Request $request, $kodeKasir)
    {
        $kasir = Kasir::find($kodeKasir);

        if (!$kasir) {
            return response()->json(['message' => 'Kasir not found'], 404);
        }

        $request->validate([
            'Nama' => 'required',
            'HP' => 'required',
        ]);

        $kasir->update($request->all());

        return response()->json(['data' => $kasir]);
    }

    // Menghapus data kasir berdasarkan KodeKasir
    public function destroy($kodeKasir)
    {
        $kasir = Kasir::find($kodeKasir);

        if (!$kasir) {
            return response()->json(['message' => 'Kasir not found'], 404);
        }

        $kasir->delete();

        return response()->json(['message' => 'Kasir deleted']);
    }
}