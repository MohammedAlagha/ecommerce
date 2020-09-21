<?php

// this method for choose folder when change locale
function getFolder()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}
