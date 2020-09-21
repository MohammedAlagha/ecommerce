<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;

    protected $table = 'settings';

    protected $fillable = ['key', 'is_translatable', 'plain_value'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['value'];

    protected $casts = [
        'is_translatable' => 'boolean'
    ];

    public static function setMany($settings)
    {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }

    public static function set($key, $value)
    {
        if ($key === 'translatable') {
            return self::setTranslatableSettings($value);
        }

        $value = is_array($value) ? json_encode($value) : $value;   //casting value to json if value is array

        self::updateOrCreate(['key' => $key], ['plain_value' => $value]);
    }

    public static function setTranslatableSettings($setting = [])
    {
        foreach ($setting as $key => $value) {
            self::updateOrCreate(
                ['key' => $key],
                ['is_translatable' => true, 'value' => $value]);
        }
    }
}
