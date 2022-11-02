<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{



    protected $fillable=['id','name','email','address','phone'];

    public function products()
    {
        return $this->hasMany(\App\Product::class,'id');
    }
}
