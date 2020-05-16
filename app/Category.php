<?php

namespace App;

use App\Section;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];
    public function subcategories()
    {

        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function section()
    {

        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
        //get name of section. Has to come with id to work
    }

    public function parentcategory()
    {

        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'category_name');
    }

    public function products()
    {

        return $this->hasMany(Product::class);
    }
}
