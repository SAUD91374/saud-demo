<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];
    function allproduct(){
        return $this->hasMany(categoryproducts::class,'category_id','id');
    }
    function product(){
        return $this->hasOne(categoryproducts::class,'category_id','id');
    }

}
