<?php

namespace App;

use App\Product;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public function categories()
    {

        return $this->hasMany(Category::class, 'section_id')->where(['parent_id' => 'ROOT', 'status' => 1])
            ->with('subcategories');
    }
}
