<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    use HasFactory;
    protected $fillable=['category_id','product_id'];
    function productId(){
        return $this->belongsTo(product::class,'product_id','id');
    }
    function categoryId(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    function productIds(){
        return $this->belongsToMany(product::class,'product_id','id');
    }
    function categoryIds(){
        return $this->belongsToMany(category::class,'category_id','id');
    }
}
