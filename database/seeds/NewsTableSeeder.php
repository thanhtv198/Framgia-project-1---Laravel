<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 8;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => 'Điện thoại iPhone 8 64GB chính hãng phối chính hãng bởi Chào cả nhà phối chính hãng bởi Chào cả nhà ',
                'content' => 'Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi Chào cả nhà. 
                 Khi các bạn làm Part 7 thì có 1 mẹo CỰC KỲ QUAN TRỌNG là mẹo diễn đạt đồng nghĩa (synonym). 
                 Mẹo này sẽ tiết kiệm cho các bạn rất nhiều thời gian lúc đọc đoạn văn và đôi khi không cần
                 hiểu gì đoạn văn cũng có thể làm đúng được. Mình gửi các bạn những tổ hợp đồng nghĩa trong 
                 Part 7 để các bạn ứng dụng làm bài nhé. Có gì các bạn #share về để lưu nhé FPTShop với nhiều 
                 quà tặng hấp dẫn Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với 
                 nhiều quà tặng hấp dẫnĐiện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop
                 với nhiều quà tặng hấp dẫn Mẹo này sẽ tiết kiệm cho các bạn rất nhiều thời gian lúc đọc đoạn văn và đôi khi không cần
                 hiểu gì đoạn văn cũng có thể làm đúng được. Mình gửi các bạn những tổ hợp đồng nghĩa trong 
                 Part 7 để các bạn ứng dụng làm bài nhé. Có gì các bạn #share về để lưu nhé FPTShop với nhiều 
                 quà tặng hấp dẫn Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop với 
                 nhiều quà tặng hấp dẫnĐiện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop
                 với nhiều quà tặng hấp dẫn',
                'avatar' => $i . '.jpg',
            ]);
        }
    }
}
