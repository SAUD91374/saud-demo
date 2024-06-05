<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['name','price','discount','qty','mfg','photo'];
    function allcategory(){
        return $this->hasMany(categoryproducts::class,'product_id','id');
    }
    function category(){
        return $this->hasOne(categoryproducts::class,'product_id','id');
    }

}
