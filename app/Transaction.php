<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable=['id_customer','id_product','qty_purchased','transaction_date'];

    public function customer()
    {
        return $this->belongsTo(\App\Customer::class,'id_customer');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
