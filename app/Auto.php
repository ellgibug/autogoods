<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    public $timestamps = false;

    protected $table = 'autos';

    public function car()
    {
        return $this->hasOne('App\Car', 'brand');
    }
}
