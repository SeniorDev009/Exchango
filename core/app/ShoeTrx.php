<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeTrx extends Model
{
    protected $guarded = [];

    protected $table = "shoes_trxs";


    public function shoe()
    {
        return $this->belongsTo('App\Shoe', 'shoe_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
