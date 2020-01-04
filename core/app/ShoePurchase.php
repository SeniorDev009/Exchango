<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoePurchase extends Model
{
    protected $guarded = [];

    protected $table = "shoes_purchase";


    public function shoe()
    {
        return $this->belongsTo('App\Shoe', 'shoe_id');
    }

    public function trx()
    {
        return $this->belongsTo('App\Trx', 'trx_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
