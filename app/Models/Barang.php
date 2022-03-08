<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{       
    public $timestamps = false;
    protected $table = 'barang';

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

     public function transaksi(){
         return $this->hasMany(Transaksi::class,'id_barang');
     }
}
