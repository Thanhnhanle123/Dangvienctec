<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestTinHoc extends FormRequest
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
            'maTinHoc' => 'required|unique:tinhhocs,maTinHoc|max:255',
            'tenTinHoc' => 'required',
            'loai' => 'required',
        ];
    }

    public function messages(){
        return [
            'maTinHoc.required' => 'Mã không được bỏ trống!',
            'maTinHoc.unique' => 'Dữ liệu đã tồn tại',
            'maTinHoc.max' => 'Không được quá 255 ký tự',
            'tenTinHoc.required' => 'Tên không được bỏ trống!',
            'loai.required' => 'Loại không được bỏ trống'
        ];
    }
}
