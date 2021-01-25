<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>52,'email'=>'Dth999@gmail.com', 'password'=>bcrypt('12345'), 'name'=>'DuongTH', 'phone'=>'0337694991','address'=>'Tiền Hải - Thái Bình'],
            ['id'=>53,'email'=>'Duongga99@gmail.com', 'password'=>bcrypt('123456'), 'name'=>'DuongGA', 'phone'=>'0345694998','address'=>'Vườn Cam - Hà Nội'],
        ]);
    }
}
