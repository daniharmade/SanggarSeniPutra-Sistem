<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SjfScheduling extends Model
{
    use HasFactory;

    protected $table = 'sjf_scheduling';

    protected $fillable = [
        'id_admin', 'id_customer', 'id_barangkesenian',
        'nama_proses', 'waktu_kedatangan', 'lama_eksekusi',
        'mulai_eksekusi', 'selesai_eksekusi', 'turn_around'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function barangkesenian()
    {
        return $this->belongsTo(BarangkesenianM::class, 'id_barangkesenian');
    }
}
