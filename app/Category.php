<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {

        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }
}
