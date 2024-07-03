<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','qty'];
    function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
    function products(){
        return $this->belongsToMany(product::class, 'product_id','id');
    }
    function photos(){
        return $this->hasMany(product_media::class,'p_id','id');
    }
   
}
