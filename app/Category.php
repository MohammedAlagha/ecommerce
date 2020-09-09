<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['parent_id', 'slug', 'status'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $hidden = ['translations'];

    protected $casts = [
        'status' => 'boolean'
    ];


    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'غيرمفعل' : 'مفعل';
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y-m-d H:i:s');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }


}


