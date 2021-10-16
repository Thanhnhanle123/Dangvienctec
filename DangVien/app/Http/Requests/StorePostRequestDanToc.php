<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestDanToc extends FormRequest
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
            'maDanToc' => 'required|unique:dantocs|max:255',
            'tenDanToc' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'maDanToc.required' => 'Mã bắt buộc nhập',
            'maDanTOc.max' => 'Tên không được vượt quá 255 ký tự',
            'maDanToc.unique' => 'Dữ liệu đã tồn tại',
            'tenDanToc.required' => 'Tên bắt buộc nhập',

        ];
    }
}
