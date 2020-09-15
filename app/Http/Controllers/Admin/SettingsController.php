<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShippingRequest;
use App\Setting;
use Illuminate\Http\Request;
use DB;
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

    public function updateShipping(ShippingRequest $request ,$id)
    {

        try {
            $shippingMethod = Setting::find($id);


            DB::beginTransaction();

            $shippingMethod->update(['plain_value'=>$request->plain_value,'status'=>$request->status]);

            //save translation
            $shippingMethod ->  value = $request->value;
            $shippingMethod->save();

            DB::commit();
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);

        }catch (\Exception $ex){

            DB::rollback();
            return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى المحاولة لاحقا']);

        };


    }

}
