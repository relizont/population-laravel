<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePopulationPostRequest extends Request
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
            'country_id' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'gender_id' => 'required',
            'total' => 'required'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_id.required' => 'The country field is required',
            'city_id.required' => 'The city field is required',
            'type_id.required' => 'The population type field is required',
            'gender_id.required' => 'The gender field is required',
            'total.required' => 'The total field is required',
        ];
    }
}
