<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        switch($this->method())
        {
            case "GET":
            case "DELETE":
                return [];

            case "POST":
                {
                    return
                        [
                            'name'=>'required',
                            'photo'=>'required|mimes:jpg,jpeg,png',
                            'status'=>'required'

                        ];
                }

            case "PUT":
            case "PATCH":
                {
//                    $collection = collect($this->request)->toArray();

                    return [
                        'name'=>'required',
                        'photo'=>'mimes:jpg,jpeg,png',
                        'status'=>'required'

                    ];

                }
        }
    }

}
