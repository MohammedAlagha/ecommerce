<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable, SoftDeletes;


    protected $fillable = [
        'brand_id',
        'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'mange_stock',
        'qty',
        'status'
    ];


    protected $with = ['translations'];

    protected $casts =
        [
            'manage_stock' => 'boolean',
            'status' => 'boolean'
        ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];

    protected $translatedAttributes = ['name', 'description', 'short_description'];



    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function photos()
    {
        return $this->hasMany(ProductGallery::class,'product_id','id');
    }


    //    ----------------------------------------------------scopes-----------------------------------------------

    public function scopeStatus($query)
    {
        return $query->where('status',1);
    }

    //--------------------------------------------------getters----------------------------------------------

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'غيرمفعل' : 'مفعل';
    }
}
