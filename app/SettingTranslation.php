<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $fillable = ['value'];

    public $timestamps = false;
}
