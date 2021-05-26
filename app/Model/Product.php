<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category_class(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
