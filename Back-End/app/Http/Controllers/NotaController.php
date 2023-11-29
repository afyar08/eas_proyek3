<?php

// File: app/Http/Controllers/NotaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    // Mendapatkan semua data nota
    public function index()
    {
        $nota = Nota::all();
        return response()->json(['data' => $nota]);
    }

    // Mendapatkan data nota berdasarkan KodeNota
    public function show($kodeNota)
    {
        $nota = Nota::find($kodeNota);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        return response()->json(['data' => $nota]);
    }

    // Menyimpan data nota baru
    public function store(Request $request)
    {
        $request->validate([
            'KodeNota' => 'required|unique:nota,KodeNota',
            'KodeTenan' => 'required',
            'KodeKasir' => 'required',
            'TglNota' => 'required',
            'JamNota' => 'required',
            'JumlahBelanja' => 'required',
            'Diskon' => 'required',
            'Total' => 'required',
        ]);

        $nota = Nota::create($request->all());

        return response()->json(['data' => $nota], 201);
    }

    // Memperbarui data nota berdasarkan KodeNota
    public function update(Request $request, $kodeNota)
    {
        $nota = Nota::find($kodeNota);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        $request->validate([
            'KodeTenan' => 'required',
            'KodeKasir' => 'required',
            'TglNota' => 'required',
            'JamNota' => 'required',
            'JumlahBelanja' => 'required',
            'Diskon' => 'required',
            'Total' => 'required',
        ]);

        $nota->update($request->all());

        return response()->json(['data' => $nota]);
    }

    // Menghapus data nota berdasarkan KodeNota
    public function destroy($kodeNota)
    {
        $nota = Nota::find($kodeNota);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota deleted']);
    }
}