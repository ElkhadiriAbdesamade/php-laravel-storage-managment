<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categorie;

class Product extends Model
{
    protected $fillable=['name','image','descreption','qty_stock','price','id_categorie','id_supplier'];

    public function categorie()
    {
        return $this->belongsTo(\App\Categorie::class,'id_categorie');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'id');
    }
}
