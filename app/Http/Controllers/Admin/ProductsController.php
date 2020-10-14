<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GeneralProductRequest;
use App\Product;
use App\Tag;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('admin.products.general.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneralProductRequest $request)
    {

        try {

        dd($request->all());
        DB::beginTransaction();
        $product = Product::create([
            'slug'=>$request->slug,
            'brand_id'=>$request->brand_id,
            'status'=>$request->status
        ]);

        // save translations
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->save();

        // save product categories
        $product->categories()->attach($request->categories);

        //save product tags
        $product->categories()->attach($request->tags);


        DB::commit();

        }catch(\Exception $ex){
            DB::rollback();

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //to store images to folder only
    public function storeImages(Request $request)
    {
        $file = $request->file('dzfile');
        $fileName = uploadImage('products',$file);

        return response()->json([
            'name'=>$fileName,
            'original_name'=>$file->getClientOriginalName(),
        ]);
    }

    //to store images in database
    public function storeImagesInDB()
    {

    }
}
