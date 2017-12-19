<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;

    protected $table = 'levels';

    public function levels()
    {
        return $this->hasMany('App\Level', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
