<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_media extends Model
{
    use HasFactory;
    protected $fillable=['p_id','type','file_path'];
}
