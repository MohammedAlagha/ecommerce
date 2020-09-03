<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Request;

class SettingsController extends Controller
{

    public function editShipping($type)
    {
        //type : free , inner , outer

        if ($type === 'free') {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        } elseif ($type === 'inner') {
            $shippingMethod = Setting::where('key', 'local_label')->first();

        } elseif ($type === 'outer') {
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        } else {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        }

        return view('admin.settings.shippings.edit',compact('shippingMethod'));

    }

    public function updateShipping(Request $request ,$id)
    {

    }

}
