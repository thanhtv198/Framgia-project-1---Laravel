<?php

use Illuminate\Database\Seeder;

class RespondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('responds')->insert([
            'user_id' => 2,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 6,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 4,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 5,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 4,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
        DB::table('responds')->insert([
            'user_id' => 6,
            'title' => 'Mua điện thoại iPhone 8 64GB chính hãng trả góp 0%',
            'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với nhiều quà tặng hấp dẫn, có cơ hội Trả góp 0% Hoặc Giảm ngay 1000000đ',
            'status' => 0,
        ]);
    }
}
