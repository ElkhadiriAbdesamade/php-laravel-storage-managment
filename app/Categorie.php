<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;

class Categorie extends Model
{
    protected $fillable=['id','name'];

    public function products()
    {
        return $this->hasMany(\App\Product::class,'id');
    }
}
