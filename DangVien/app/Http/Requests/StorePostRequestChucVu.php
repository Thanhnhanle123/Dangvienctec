<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestChucVu extends FormRequest
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
            'maChucVu' => 'required|unique:chucvus,maChucVu|max:255',
            'tenChucVu' => 'required',
        ];
    }

    public function messages(){
        return [
            'maChucVu.required' => 'Mã không được bỏ trống!',
            'maChucVu.unique' => 'Dữ liệu đã tồn tại',
            'maChucVu.max' => 'Không được quá 255 ký tự',
            'tenChucVu.required' => 'Tên không được bỏ trống!'
        ];
    }
}
