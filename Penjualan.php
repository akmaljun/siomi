<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'penjualan';
    
    protected $fillable = [
          'NamaInvestor',
          'datainvestor_id',
          'reksadana_id',
          'jumlahunit',
          'jumlahrupiah',
          'Terbilang',
          'rekening_id',
          'KodeKonfirmasi'
    ];
    

    public static function boot()
    {
        parent::boot();

        Penjualan::observe(new UserActionsObserver);
    }
    
    public function datainvestor()
    {
        return $this->hasOne('App\DataInvestor', 'id', 'datainvestor_id');
    }


    public function reksadana()
    {
        return $this->hasOne('App\Reksadana', 'id', 'reksadana_id');
    }


    public function rekening()
    {
        return $this->hasOne('App\Rekening', 'id', 'rekening_id');
    }


    
    
    
}