<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangkesenianM extends Model
{
    use HasFactory;

    public $table = 'barangkesenian_m';
    protected $fillable = [
        'foto',
        'nama',
        'paket',
        'anggota',
        'harga',
        'deskripsi',
        'video', // Add this line
    ];
    protected $casts = [
        'foto' => 'array', // Cast 'foto' as an array
    ];
}
