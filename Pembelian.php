<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Pembelian extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'pembelian';
    
    protected $fillable = [
          'nominal',
          'terbilang',
          'jenis_mata_uang',
          'jenis_penempatan',
          'kode_konfirmasi',
          'reksadana_id',
          'user_id',
          'konfirmasipembayaran_id',
          'status',
    ];
    

    public static function boot()
    {
        parent::boot();

        Pembelian::observe(new UserActionsObserver);
    }
    
    public function reksadana()
    {
        return $this->hasOne('App\Reksadana', 'id', 'reksadana_id');
    }


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function konfirmasipembayaran()
    {
        return $this->hasOne('App\KonfirmasiPembayaran', 'id', 'konfirmasipembayaran_id');
    }


    
    
    
}