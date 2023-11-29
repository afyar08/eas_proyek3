<?php

// File: app/Models/Nota.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'nota';
    protected $primaryKey = 'KodeNota'; // Sesuaikan dengan kolom yang digunakan sebagai primary key
    protected $fillable = [
        'KodeNota',
        'KodeTenan',
        'KodeKasir',
        'TglNota',
        'JamNota',
        'JumlahBelanja',
        'Diskon',
        'Total',
    ];

    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini

    // Contoh relasi ke tabel Tenan
    public function tenan()
    {
        return $this->belongsTo(Tenan::class, 'KodeTenan', 'KodeTenan');
    }

    // Contoh relasi ke tabel Kasir
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'KodeKasir', 'KodeKasir');
    }

    // Contoh relasi ke tabel BarangNota
    public function barangNota()
    {
        return $this->hasMany(BarangNota::class, 'KodeNota', 'KodeNota');
    }
}