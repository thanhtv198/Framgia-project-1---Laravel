<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Xiaomi' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => 'Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                    Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client. Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop',
                    'promotion' => '200000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => 1,
                    'manufacture_id' => 1,
                    'category_id' => 3,
                    'color' => '',
                    'back_camera' => $i + 2,
                    'front_camera' => 6,
                    'ram' => 4,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 64,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 5.0, Retina HD',
                    'os' => 'IOS 10',
                    'status' => 1,
                    'check' => '',
                    'views' => $i + 2,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . $i,
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Oppo' . ' ' . str_random(7),
                    'price' => ($i + 2) . '000000',
                    'description' => '64GB được phân phối Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                    Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client. chính hãng bởi FPTShop Điện thoại Apple iPhone 8 64GB được phân phối chính hãng bởi FPTShop',
                    'promotion' => '200000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => 2,
                    'manufacture_id' => 2,
                    'category_id' => 4,
                    'color' => '',
                    'back_camera' => $i + 2,
                    'front_camera' => 6,
                    'ram' => 6,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 64,
                    'battery' => 3000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'check' => '',
                    'views' => $i + 2,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . ($i + 5),
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Samsung' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => 'Công đoạn này khá là nhọc, mình chưa tìm ra cách khác nhanh hơn, nhưng thôi có còn hơn không. Đây là cách mình dùng Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                    Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client. để import các dữ liệu từ CSDL MySQL cũ vào Postgres.',
                    'promotion' => '200000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => 3,
                    'manufacture_id' => 3,
                    'category_id' => 2,
                    'color' => '',
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 4,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 32,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'check' => '',
                    'views' => $i + 5,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . ($i + 10),
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Iphone' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => 'Đầu tiên các bạn cần liệt kê thứ tự các bảng cần import, tất nhiên là các bảng một trước rồi mới đến bảng nhiều, sau đó export từng bảng Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                                        Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client.',
                    'promotion' => '200000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => 4,
                    'manufacture_id' => 4,
                    'category_id' => 1,
                    'color' => '',
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 3,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 128,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 1,
                    'check' => '',
                    'views' => $i + 2,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . ($i + 15),
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 15),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Meizu' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => 'Đầu tiên các bạn cần liệt kê thứ tự các bảng cần import, tất nhiên là các bảng một trước rồi mới đến bảng nhiều, sau đó export từng bảng Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                    Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client.',
                    'promotion' => '300000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => $i + 1,
                    'manufacture_id' => 2,
                    'category_id' => 5,
                    'color' => '',
                    'back_camera' => $i + 2,
                    'front_camera' => 8,
                    'ram' => 3,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 128,
                    'battery' => 4000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 0,
                    'check' => '',
                    'views' => 0,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . ($i + 20),
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 20),
                ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert(
                [
                    'name' => 'Sony' . ' ' . str_random(7),
                    'price' => ($i + 1) . '000000',
                    'description' => 'Đầu tiên các bạn cần liệt kê thứ tự các bảng cần import, tất nhiên là các bảng một trước rồi mới đến bảng nhiều, sau đó export từng bảng Ở phiên bản 9.0, tính năng tự động sao lưu dự phòng mới chỉ hỗ trợ phương pháp Asynchronous Replication, có nghĩa là một transaction gửi đến Server chính (Master) được thực hiện và xác nhận hoàn thành với client ngay khi hoàn thành mà không cần quan tâm đến việc bản sao lưu của transaction này đã được hoàn thành ở server dự phòng (slave) hay chưa.
                    Sang phiên bản 9.1 (phiên bản chính thức đi kèm với Ubuntu 12.04), tính năng tự động sao lưu dự phòng được bổ sung thêm một phương pháp nữa, đó là Synchronous Replication. Phương pháp này hoạt đồng tương tự như Asynchronous Replication, chỉ khác duy nhất là Master sẽ đợi cho Slave xác nhận đã sao lưu xong, sau đó mới "trả lời" client.',
                    'promotion' => '300000',
                    'date_manufacture' => '2018-10-12',
                    'user_id' => $i + 1,
                    'manufacture_id' => 2,
                    'category_id' => 6,
                    'color' => '',
                    'back_camera' => $i + 4,
                    'front_camera' => 8,
                    'ram' => 4,
                    'cpu' => 'Apple A11 Bionic 6 nhân',
                    'sim' => '1 nano sim',
                    'memory' => 32,
                    'battery' => 3000,
                    'screen' => 'LED-backlit IPS LCD, 4.7, Retina HD',
                    'os' => 'Andorid 7.0',
                    'status' => 2,
                    'check' => 'the price not right',
                    'views' => 0,
                    'remove' => 0,
                    'created_at' => '2018-08-08 01:14:0' . ($i + 25),
                    'updated_at' => '2018-08-08 01:14:0' . ($i + 25),
                ]);
        }
    }
}
