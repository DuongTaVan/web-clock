<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	['id'=>1,'email'=>'Duongtv2712@gmail.com', 'password'=>bcrypt('12345'), 'name'=>'DuongTV', 'phone'=>'0337694991','address'=>'Tiền Hải - Thái Bình'],
        	['id'=>2,'email'=>'Duongga99@gmail.com', 'password'=>bcrypt('123456'), 'name'=>'DuongGA', 'phone'=>'0345694998','address'=>'Vườn Cam - Hà Nội'],
        	

        ]);
    }
}
