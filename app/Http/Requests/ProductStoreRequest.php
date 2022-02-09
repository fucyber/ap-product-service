<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductStoreRequest extends FormRequest
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
        'prd_no' => 'required|unique:products',
        'name' => 'required|string|min:3',
        'published' => 'required',
        'price' => 'required',
      ];
    }

    public function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Validation errors',
        'data'      => $validator->errors()
      ]));
    }

    public function messages() //OPTIONAL
    {
        return [
            'prd_no.unique' => 'ข้อมูลนี้มีในระบบแล้ว กรุณาเลือกใหม่',
        ];
    }
}
