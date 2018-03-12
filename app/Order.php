<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

//    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'person', 'id');
    }
}
