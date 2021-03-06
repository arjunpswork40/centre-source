<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
