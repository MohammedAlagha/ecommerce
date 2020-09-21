<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Tag;
use Yajra\DataTables\DataTables;
use DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index');

    }

    public function data()
    {
        $tags = Tag::all();

        return DataTables::of($tags)->addColumn('action', function ($tag) {
            return "<a class='btn btn-xs btn-primary edit' href='" . route('admin.tags.edit', $tag->id) . "' data-value = '" . $tag->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$tag->id' data-url='" . route('admin.tags.destroy', $tag->id) . "'><i class='fa fa-trash'></i></a>";
        })->addColumn('name', function ($tag) {
            return $tag->name;
        })->rawColumns(['action', 'name'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        try {


            DB::beginTransaction();


            $tag = Tag::create($request->all());

            $tag->name = $request->name;
            $tag->save();


            DB::commit();

            return redirect()->route('admin.tags.index')->with(['success' => 'تمت الاضافة بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.tags.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        try {

            DB::beginTransaction();

            $tag->update($request->all());


            $tag->name = $request->name;
            $tag->save();


            DB::commit();

            return redirect()->route('admin.tags.index')->with(['success' => 'تم التعديل بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.tags.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {

            $tag->translation()->delete();

            $tag->delete();

            return \response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return \response()->json(['status' => 'error', 'message' => 'هناك خطأ ما']);

        };
    }

}
