<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SanPham;
//use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<5;$i++)
        {
            $sp=new SanPham;
            $sp->fill([
                'id'=>'San pham' .$i,
                'mo_ta'=>'Day la mo ta cua san pham'.$i,
                'so_luong'=>$i*2,
                'gia'=>$i*10000,
                'hinh'=>$i.'.jpg',
                'loai_san_pham_id'=>($i-1)%5+1
            ]);
            $sp->save();
        }
    }
}
