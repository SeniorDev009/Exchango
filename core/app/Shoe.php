<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shoe extends Model
{
    protected $guarded = [];

    protected $table = "shoes";

    public function shoeTrx()
    {
        return $this->hasMany('App\ShoeTrx');
    }

    public function shoePurchase()
    {
        return $this->hasMany('App\ShoePurchase');
    }
}
