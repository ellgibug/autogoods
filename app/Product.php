<?php

namespace App;

//use Gloudemans\Shoppingcart\Contracts\Buyable;
//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
//class Product extends Model implements Buyable
{
    public $timestamps = false;

    private $id;
    private $name;
    private $price;

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }

//    use Searchable;

    public function searchableAs()
    {
        return 'name';
    }

    public function levels()
    {
        return $this->belongsToMany('App\Level');
    }

}
