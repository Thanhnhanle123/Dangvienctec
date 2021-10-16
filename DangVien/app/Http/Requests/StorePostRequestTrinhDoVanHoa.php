<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestTrinhDoVanHoa extends FormRequest
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
            'maTrinhDo' => 'required|unique:trinhdovanhoas,maTrinhDo|max:255',
            'tenTrinhDo' => 'required',
        ];
    }

    public function messages(){
        return [
            'maTrinhDo.required' => 'Mã không được bỏ trống!',
            'maTrinhDo.unique' => 'Dữ liệu đã tồn tại',
            'maTrinhDo.max' => 'Không được quá 255 ký tự',
            'tenTrinhDo.required' => 'Tên không được bỏ trống!'
        ];
    }
}
