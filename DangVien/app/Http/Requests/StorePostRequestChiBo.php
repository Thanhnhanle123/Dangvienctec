<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestChiBo extends FormRequest
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
            'maChiBo' => 'required|unique:chibos,maChiBo|max:255',
            'tenChiBo' => 'required',
        ];
    }

    public function messages(){
        return [
            'maChiBo.required' => 'Mã không được bỏ trống!',
            'maChiBo.unique' => 'Dữ liệu đã tồn tại',
            'maChiBo.max' => 'Không được quá 255 ký tự',
            'tenChiBo.required' => 'Tên không được bỏ trống!'
        ];
    }
}
