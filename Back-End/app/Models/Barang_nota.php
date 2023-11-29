<?php

// File: app/Models/BarangNota.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangNota extends Model
{
    use HasFactory;

    protected $table = 'barang_nota';
    protected $fillable = [
        'KodeNota',
        'KodeBarang',
        'JumlahBarang',
        'HargaSatuan',
        'Jumlah',
    ];

    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'KodeBarang', 'id');
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class, 'KodeNota', 'KodeNota');
    }
}