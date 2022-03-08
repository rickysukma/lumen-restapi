<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{       
    public $timestamps = false;
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $table = 'perusahaan';

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
}
