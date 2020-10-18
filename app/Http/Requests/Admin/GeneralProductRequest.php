<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GeneralProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //main information validation
            'name'=>'required|max:100',
            'slug'=>'required|unique:products,slug,'.$this->id,
            'description'=>'required|max:1000',
            'short_description'=>'nullable|max:500',
            'categories'=>'required|array|min:1',
            'categories.*'=>'numeric|exists:categories,id',
            'tags'=>'nullable|array|min:1',
            'tags.*'=>'numeric|exists:tags,id',
            'brand_id'=>'required|exists:brands,id',

            //price validation
            'price'=>'required|min:0|numeric',
            'special_price'=>'nullable|numeric',
            'special_price_type'=>'required_with:special_price|in:fixed,percent',
            'special_price_start'=>'date|required_with:special_price|date_format:Y-m-d',
            'special_price_end'=>'data|required_with:special_price|date_format:Y-m-d|after:special_price_start',

            //stock validation
            'sku'=>'nullable|min:3|max:12',
            'manage_stock'=>'required|in:0,1',
            'qty'=>'required_if:manage_stock,==,1',
            'status'=>'required|in:0,1',

            //images validation
            'documents' =>'required|array|min:1',
            'documents.*'=>'required|string'
        ];
    }
}
