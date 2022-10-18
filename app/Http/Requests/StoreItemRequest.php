<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            //
            'name' => 'required',
            'store_id' => 'required',
            'company_id' => 'required',
            'type_id' => 'required',
            'unit_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
        ];
    }
}
