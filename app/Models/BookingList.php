<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BookingList extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_barangkesenian',
        'id_admin',
        'id_customer',
        'date',
        'alamat',
        'bukti_pembayaran',
        'status',
        'kode_transaksi'
    ];


     // Generate a unique kode_transaksi
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($model) {
             // Generate kode_transaksi with a prefix and timestamp
             $model->kode_transaksi = 'TRX-' . Str::upper(Str::random(10)) . '-' . now()->format('YmdHis');
         });
     }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function kesenian(){
        return $this->hasOne(BarangkesenianM::class, 'id', 'id_barangkesenian');
    }

    // public function room(){
    //     return $this->hasOne(BarangkesenianM::class, 'id', 'id_barangkesenian');
    // }

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_customer');
    }

    public function admin(){
        return $this->hasOne(User::class, 'id', 'id_admin');
    }
}
