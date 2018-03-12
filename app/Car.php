<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;

    protected $table = 'cars';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
