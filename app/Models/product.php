<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['name','price','discount','qty','mfg'];
    function allcategory(){
        return $this->hasmany(categoryproducts::class,'product_id','id');
    }
    function category(){
        return $this->hasone(categoryproducts::class,'product_id','id');
    }

}
