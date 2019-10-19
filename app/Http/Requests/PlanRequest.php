<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name' => 'required|max:255|unique:plans',

            'description' => 'required',

            'price' => 'required|max:10',

            'currency' => 'required|max:3',

            'duration' => 'required|max:5'
        ];
    }
}
