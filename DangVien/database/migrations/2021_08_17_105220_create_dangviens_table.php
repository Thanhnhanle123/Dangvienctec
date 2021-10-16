<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangviens', function (Blueprint $table) {
            $table->id();
            $table->string('maDangVien');
            $table->string('hoLot');
            $table->string('tenGoiKhac');
            $table->boolean('gioiTinh');
            $table->date('ngaySinh');
            $table->integer('noiSinh_id');
            $table->integer('CCCD_id');
            $table->integer('danToc');
            $table->integer('tonGiao');
            $table->string('quocTich');
            $table->string('queQuan');
            $table->string('diaChiThuongTru');
            $table->string('noiOHienTai');
            $table->string('dienThoaiCoQuan');
            $table->string('dienThoaiNha');
            $table->string('dienThoaiCaNhan');
            $table->string('email');
            $table->string('tinhTrangHonNhan');
            $table->string('thanhPhanXuatThan');
            $table->string('dienUuTien');
            $table->string('nangKhieu');
            $table->string('soTruong');
            $table->string('tinhTrangSucKhoe');
            $table->string('khuyetTat');
            $table->integer('trinhDoVanHoa_id');
            $table->integer('ngoaiNgu_id');
            $table->integer('tinHoc_id');
            $table->integer('chucVu_id');
            $table->integer('chiBo_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dangviens');
    }
}
