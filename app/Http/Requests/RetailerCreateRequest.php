<?php

namespace App\Http\Requests;

class RetailerCreateRequest extends Request
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
            'name' => 'required|unique:retailers,name',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ];
    }
}
