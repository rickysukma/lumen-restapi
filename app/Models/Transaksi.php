<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{       
    public $timestamps = false;
    protected $table = 'transaksi';
    protected $appends = ['ptnama','namabarang','harga','total'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

     public function barang(){
         return $this->belongsTo(Barang::class,'id_barang');
     }
     
     public function pt(){
         return $this->belongsTo(Company::class,'kode_perusahaan','kode');
     }

    public function getNamabarangAttribute()
    {
        return optional($this->barang)->nama;
    }
    
    public function getHargaAttribute()
    {
        return optional($this->barang)->harga;
    }
    
    public function getPtnamaAttribute()
    {
        return optional($this->pt)->nama;
    }
    
    public function getTotalAttribute()
    {
        return $this->harga * $this->jumlah;
    }
}
