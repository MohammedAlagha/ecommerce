<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $admin = Admin::find(auth('admin')->user()->id);
        return view('admin.profile.edit',compact('admin'));
    }

    public function updateProfile(ProfileRequest $request)
    {

        try {
//            dd($request->except('password','password_confirmation'));
//            dd($request->filled('password','password_confirmation'));
            if ($request->filled('password','password_confirmation')) {
                Admin::find(auth('admin')->user()->id)->update($request->all());
            }else{
                Admin::find(auth('admin')->user()->id)->update($request->except('password','password_confirmation'));
            }


            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){

            return redirect()->back()->with(['error'=>'هناك خطأ ما']);
        }


    }
}
