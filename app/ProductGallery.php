<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'product_gallery';

    protected $fillable = ['product_id','photo'];



    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id')->withDefault();
    }
}
