<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index');
    }

    public function data()
    {
        $brands = Brand::all();

        return DataTables::of($brands)->addColumn('action', function ($brand) {
            return "<a class='btn btn-xs btn-primary edit' href='" . route('admin.brands.edit', $brand->id) . "' data-value = '" . $brand->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$brand->id' data-url='" . route('admin.brands.destroy', $brand->id) . "'><i class='fa fa-trash'></i></a>";
        })->addColumn('name', function ($brand) {
            return $brand->name;
        })->addColumn('photo', function ($brand) {
            return "<img height='80' width='90' src='$brand->photo_url'>";
        })->rawColumns(['action', 'name', 'photo'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {


            DB::beginTransaction();

            $request_data = $request->except('photo');

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $image_path = uploadImage('brands', $request->file('photo'), 'jpg');   //I create uploadImage method in Helper/general

                $request_data['photo'] = $image_path;
            }


            $brand = Brand::create($request_data);

            $brand->name = $request->name;
            $brand->save();


            DB::commit();

            return redirect()->route('admin.brands.index')->with(['success' => 'تمت الاضافة بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {

            DB::beginTransaction();

            $request_data = $request->except('photo');

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $image_path = uploadImage('brands', $request->file('photo'), 'jpg');   //I create uploadImage method in Helper/general

                $request_data['photo'] = $image_path;

                if (Storage::disk('images')->exists('brands/' . $brand->photo)) {
                    deleteImage('brands', $brand->photo);  //I create deleteImage method in Helper/general to delete previous image from disk
                }
            }


            $brand->update($request_data);


            $brand->name = $request->name;
            $brand->save();


            DB::commit();

            return redirect()->route('admin.brands.index')->with(['success' => 'تم التعديل بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {

        try {
            if (Storage::disk('images')->exists('brands/' . $brand->photo)) {
                deleteImage('brands', $brand->photo);  //I create deleteImage method in Helper/general to delete previous image from disk
            }

            $brand->delete();

            return \response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return \response()->json(['status' => 'error', 'message' => 'هناك خطأ ما']);

        };
    }
}
