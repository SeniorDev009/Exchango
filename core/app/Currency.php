<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];
    protected $table = "currencies";

    public function trx()
    {
        return $this->hasMany('App\Trx');
    }

}
