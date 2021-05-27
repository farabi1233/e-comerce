<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function customer_class(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function product_class(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function shipping_class(){
        return $this->belongsTo(Shipping::class,'shiping_id','id');
    }
}
