<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    use Translatable;

    protected $fillable = ['status','photo'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];



    protected $hidden = ['translations'];

    protected $appends = ['photo_url'];

    protected $casts = [
        'status'=>'boolean'
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

    public function getPhotoUrlAttribute()
    {
        return asset('images/brands/'.$this->photo);
    }


}
