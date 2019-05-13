<?php

namespace App;

use App\Product;

class Seller extends User
{
    public function transactions()
    {
        return $this->hasMany(Product::class);
    }
}
