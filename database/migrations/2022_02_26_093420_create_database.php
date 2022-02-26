<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai_san_pham');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('tittle');
            $table->string('description');
            $table->integer('size');
            $table->string('color');
            $table->integer('price');
            $table->foreignId('loai_san_pham_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('loai_san_pham_id')->references('id')->on('loai_san_phams');
        });

        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iduser');
            $table->foreign('iduser')->references('id')->on('users');
        });
        Schema::create('chi_tiet_gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idgiohang');
            $table->foreign('idgiohang')->references('id')->on('gio_hangs');
            $table->foreignId('idsanpham');
            $table->foreign('idsanpham')->references('id')->on('san_phams');
            $table->integer('soluong');
            $table->timestamps();
        });
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idtaikhoan');
            $table->foreign('idtaikhoan')->references('id')->on('users');
            $table->dateTime('ngaylap');
            $table->string('diachi');
            $table->string('sodienthoai');
            $table->string('ghichu');
            $table->integer('tongtien');
            $table->tinyInteger('TrangThai')->default(1);
        });
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->integer('soluong');
            $table->integer('dongia');
            $table->foreignId('idsanpham');
            $table->foreign('idsanpham')->references('id')->on('san_phams');
            $table->foreignId('idhoadon');
            $table->foreign('idhoadon')->references('id')->on('hoa_dons');
        });
        Schema::create('dia_chis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idtaikhoan');
            $table->foreign('idtaikhoan')->references('id')->on('users');
            $table->string('tennguoinhan');
            $table->string('sodienthoai');
            $table->string('tinhthanhpho');
            $table->string('quanhuyen');
            $table->string('phuongxa');
            $table->string('diachichitiet');
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
        Schema::dropIfExists('loai_san_phams');
        Schema::dropIfExists('san_phams');
        Schema::dropIfExists('gio_hangs');
        Schema::dropIfExists('chi_tiet_gio_hangs');
        Schema::dropIfExists('hoa_dons');
        Schema::dropIfExists('chi_tiet_hoa_dons');
        Schema::dropIfExists('dia_chis');
    }
}
