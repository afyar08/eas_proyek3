<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasir';
    protected $primaryKey = 'KodeKasir'; // Sesuaikan dengan kolom yang digunakan sebagai primary key
    public $incrementing = false; // Tandai bahwa kolom ini tidak di-increment karena menggunakan string sebagai primary key
    protected $fillable = [
        'KodeKasir',
        'Nama',
        'HP',
    ];

    // Jika Anda memiliki relasi dengan tabel lain, Anda bisa mendefinisikannya di sini
}