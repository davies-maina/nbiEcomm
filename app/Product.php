<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Section;

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
}
