<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoaiSanPham;
//use Illuminate\Support\Facades\DB;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //nhap du lieu gia
        for($i=1;$i<5;$i++)
        {
            $loai=new LoaiSanPham;
            $loai->fill([
                'ten_loai_san_pham'=>'Loai san pham'.$i
            ]);
            $loai->save();
        }
    }
}
