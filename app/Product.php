<?php

namespace App;


use App\Section;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function section()
    {

        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'category_name', 'parent_id');
    }

    public function attributes()
    {

        return $this->hasMany(productattributes::class)->select('id', 'product_id', 'sku', 'size', 'price', 'stock');
    }
}
