<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestTonGiao extends FormRequest
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
            'maTonGiao' => 'required|unique:tongiaos,maTonGiao|max:255',
            'tenTonGiao' => 'required',
        ];
    }

    public function messages(){
        return [
            'maTonGiao.required' => 'Mã không được bỏ trống!',
            'maTonGiao.unique' => 'Dữ liệu đã tồn tại',
            'maTonGiao.max' => 'Không được quá 255 ký tự',
            'tenTonGiao.required' => 'Tên không được bỏ trống!'
        ];
    }
}
