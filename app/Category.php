<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['parent_id','slug','status'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $hidden = ['translations'];

    protected $casts = [
        'status'=>'boolean'
    ];
}
