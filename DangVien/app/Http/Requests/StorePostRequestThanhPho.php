<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestThanhPho extends FormRequest
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
            'maThanhPho' => 'required|unique:thanhphos,maThanhPho|max:255',
            'tenThanhPho' => 'required',
        ];
    }

    public function messages(){
        return [
            'maThanhPho.required' => 'Mã không được bỏ trống!',
            'maThanhPho.unique' => 'Dữ liệu đã tồn tại',
            'maThanhPho.max' => 'Không được quá 255 ký tự',
            'tenThanhPho.required' => 'Tên không được bỏ trống!'
        ];
    }
}
