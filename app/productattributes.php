<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productattributes extends Model
{
    public function product()
    {

        return $this->belongsTo(Product::class)->select('id', 'product_name');
    }
}
