<?php

// this method for choose folder when change locale
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function getFolder()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

function uploadImage($folder, $image, $format = 'JPG')
{
    $photo = Image::make($image)->encode($format);

    Storage::disk('images')->put($folder . '/' . $image->hashName(), (string)$photo, 'public');

    return $image->hashName();
}


function deleteImage($folder, $image)
{
    Storage::disk('images')->delete($folder . '/' . $image);
}
