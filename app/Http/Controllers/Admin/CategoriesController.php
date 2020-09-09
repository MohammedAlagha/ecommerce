<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    public function data()
    {
        $categories = Category::all();

        return DataTables::of($categories)->addColumn('action', function ($category) {
            return "<a class='btn btn-xs btn-primary edit' href='" . route('admin.categories.edit', $category->id) . "' data-value = '" . $category->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$category->id' data-url='" . route('admin.categories.destroy', $category->id) . "'><i class='fa fa-trash'></i></a>";
        })->addColumn('name', function ($category) {
            return $category->name;
        })->rawColumns(['action', 'name'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = Category::create($request->all());

            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.categories.index')->with(['success' => 'تمت الاضافة بنجاح']);

        }catch (\Exception $ex){

            return redirect()->route('admin.categories.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);

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
    public function edit(Category $category)
    {
        if (!$category) {
            return redirect()->route('admin.categories.index')->with(['error' => 'هذا القسم غير موجود']);
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            if (!$category) {
                return redirect()->route('admin.categories.index')->with(['error' => 'هذا القسم غير موجود']);
            }

            $category->update($request->all());

            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.categories.index')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.categories.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة قيما بعد']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if (!$category) {
                return \response()->json(['status'=>'error','message'=>'هذا القسم غير موجود']);
            }

            $category->delete();

            return \response()->json(['status'=>'success','message'=>'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return \response()->json(['status'=>'error','message'=>'هناك خطأ ما']);

        };
    }
}
