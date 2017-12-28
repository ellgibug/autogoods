<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adaptability extends Model
{
    public $timestamps = false;

    protected $table = 'adaptabilities';

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
