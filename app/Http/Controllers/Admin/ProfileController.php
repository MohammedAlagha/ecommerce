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
            dd($request->all());
            Admin::find(auth('admin')->user()->id)->update($request->all());

            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){

            return redirect()->back()->with(['error'=>'هناك خطأ ما']);
        }


    }
}
