<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['id','name','email','address','phone'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'id');
    }
}
