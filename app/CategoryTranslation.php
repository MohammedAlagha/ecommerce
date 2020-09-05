<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';

    protected $fillable = ['name'];

    public $timestamps = false;
}
