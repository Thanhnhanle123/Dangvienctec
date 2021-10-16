<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostDangVien extends FormRequest
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
            'maDangVien' => 'required|unique:dangviens,maDangVien|max:255',
            'hoLot' => 'required',
            'ten' => 'required',
            'ngaySinh' => 'required',
            'noiSinh_ma' => 'required',
            'CCCD' => 'required|unique:c_c_c_d_s,CCCD|max:255',
            'ngayCap' => 'required',
            'noiCap' => 'required',
            'danToc_ma' => 'required',
            'tonGiao_ma' => 'required',
            'queQuan_ma' => 'required',
            'diaChiThuongTru' => 'required',
            'noiOHienTai' => 'required',
            'dienThoaiCaNhan' => 'required',
            'trinhDoVanHoa_ma' => 'required',
            'chucVu_ma' => 'required',
            'chiBo_ma' => 'required',
        ];
    }
    public function messages(){
        return [
            'maDangVien.required' => 'bắt buộc nhập',
            'maDangVien.unique' => 'Mã đảng viên đã tồn tại',
            'hoLot.required' => 'bắt buộc nhập',
            'ten.required' => ' bắt buộc nhập',
            'ngaySinh.required' => 'bắt buộc nhập',
            'noiSinh_ma.required' => ' bắt buộc nhập',
            'CCCD.required' => 'CMND đã tồn tại',
            'ngayCap.required' => 'bắt buộc nhập',
            'noiCap.required' => 'bắt buộc nhập',
            'danToc_ma.required' => 'bắt buộc nhập',
            'tonGiao_ma.required' => ' bắt buộc nhập',
            'queQuan_ma.required' => ' bắt buộc nhập',
            'diaChiThuongTru.required' => 'bắt buộc nhập',
            'noiOHienTai.required' => 'bắt buộc nhập',
            'dienThoaiCaNhan.required' => 'bắt buộc nhập',
            'trinhDoVanHoa_ma.required' => 'bắt buộc nhập',
            'chucVu_ma.required' => 'bắt buộc nhập',
            'chiBo_ma.required' => 'bắt buộc nhập',
        ];
    }
}
