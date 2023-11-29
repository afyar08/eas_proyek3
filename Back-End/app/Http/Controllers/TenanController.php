<?php
// File: app/Http/Controllers/TenanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenan;

class TenanController extends Controller
{
    // Mendapatkan semua data tenan
    public function index()
    {
        $tenan = Tenan::all();
        return response()->json(['data' => $tenan]);
    }

    // Mendapatkan data tenan berdasarkan KodeTenan
    public function show($kodeTenan)
    {
        $tenan = Tenan::find($kodeTenan);

        if (!$tenan) {
            return response()->json(['message' => 'Tenan not found'], 404);
        }

        return response()->json(['data' => $tenan]);
    }

    // Menyimpan data tenan baru
    public function store(Request $request)
    {
        $request->validate([
            'KodeTenan' => 'required|unique:tenan,KodeTenan',
            'NamaTenan' => 'required',
            'HP' => 'required',
        ]);

        $tenan = Tenan::create($request->all());

        return response()->json(['data' => $tenan], 201);
    }

    // Memperbarui data tenan berdasarkan KodeTenan
    public function update(Request $request, $kodeTenan)
    {
        $tenan = Tenan::find($kodeTenan);

        if (!$tenan) {
            return response()->json(['message' => 'Tenan not found'], 404);
        }

        $request->validate([
            'NamaTenan' => 'required',
            'HP' => 'required',
        ]);

        $tenan->update($request->all());

        return response()->json(['data' => $tenan]);
    }

    // Menghapus data tenan berdasarkan KodeTenan
    public function destroy($kodeTenan)
    {
        $tenan = Tenan::find($kodeTenan);

        if (!$tenan) {
            return response()->json(['message' => 'Tenan not found'], 404);
        }

        $tenan->delete();

        return response()->json(['message' => 'Tenan deleted']);
    }
}
