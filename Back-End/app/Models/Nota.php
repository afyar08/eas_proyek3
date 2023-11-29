<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'nota';
    protected $primaryKey = 'KodeNota'; // Sesuaikan dengan kolom yang digunakan sebagai primary key
    public $incrementing = false; // Tandai bahwa kolom ini tidak di-increment
    protected $fillable = [
        'KodeBarang',
        'NamaBarang',
        'Satuan',
        'HargaSatuan',
        'Stok',
    ];
}