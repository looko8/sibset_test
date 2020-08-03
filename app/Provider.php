<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product', 'providers_products');
    }

    public function index() {
        return Provider::all();
    }

    public function getProvidersWithMoreThanOneSupply()
    {
        return Provider::all()->loadCount('products')->where('products_count', ">", 1);
    }
}
