<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\SubCategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subCategories.index');
    }

    public function data()
    {
        $subCategories = Category::whereNotNull('parent_id')->with('parent')->get();

        return DataTables::of($subCategories)->addColumn('action', function ($subCategory) {
            return "<a class='btn btn-xs btn-primary edit' href='" . route('admin.subCategories.edit', $subCategory->id) . "' data-value = '" . $subCategory->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$subCategory->id' data-url='" . route('admin.subCategories.destroy', $subCategory->id) . "'><i class='fa fa-trash'></i></a>";
        })->addColumn('name', function ($subCategory) {
            return $subCategory->name;
        })->addColumn('parent',function ($subCategory){
            return $subCategory->parent->name;
        })->rawColumns(['action', 'name','parent'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();

        return view('admin.subCategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        try {


            $subCategory = Category::create($request->all());

            $subCategory->name = $request->name;
            $subCategory->save();

            return redirect()->route('admin.subCategories.index')->with(['success' => 'تمت الاضافة بنجاح']);

        }catch (\Exception $ex){

            return redirect()->route('admin.subCategories.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);

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
    public function edit(Category $subCategory)
    {

        $categories = Category::whereNull('parent_id')->get();

//        if (!$subCategory) {
//            return redirect()->route('admin.subCategories.index')->with(['error' => 'هذا القسم غير موجود']);
//        }

        return view('admin.subCategories.edit', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, Category $subCategory)
    {


        try {
            /////////////////////////////

//            if (!$subCategory) {
//                return redirect()->route('admin.subCategories.index')->with(['error' => 'هذا القسم غير موجود']);
//            }

            $subCategory->update($request->all());

            $subCategory->name = $request->name;
            $subCategory->save();

            return redirect()->route('admin.subCategories.index')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.subCategories.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $subCategory)
    {
        try {
//            if (!$subCategory) {
//                return \response()->json(['status'=>'error','message'=>'هذا القسم غير موجود']);
//            }

            $subCategory->delete();

            return \response()->json(['status'=>'success','message'=>'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return \response()->json(['status'=>'error','message'=>'هناك خطأ ما']);

        };
    }
}
