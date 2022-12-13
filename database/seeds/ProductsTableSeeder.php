<?php

use App\Models\Product;
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
        $products = [
            [
                'id' => 1,
                'product_category_id' => 1,
                'name' => 'Apple Watch 1',
                'slug' => 'appple-watch-1',
                'description' => 'có màn hình rộng 42mm, độ phân giải 272x340 pixels, dây đeo bằng cao su tổng hợp tạo sự thoải mái cho người đeo. Thiết bị sử dụng sạc không dây, kho ứng dụng đa dạng phong phú',
                'quantity' => rand(10, 100),
                'input_price' => 6099000,
                'price' => 7999000,
                'image' => '[{"name":"public\/uploads\/products\/apple-watch-1-1.jpg"},{"name":"public\/uploads\/products\/apple-watch-1-2.jpg"},{"name":"public\/uploads\/products\/apple-watch-1-1.jpg"}]',
            ],
            [
                'id' => 2,
                'product_category_id' => 1,
                'name' => 'Apple Watch 2',
                'slug' => 'appple-watch-2',
                'description' => 'Apple Watch 2 có màn hình 38mm, chạy hệ điều hành WatchOS 3, dung lượng pin nên tới 18 giờ, sản phẩm này của Apple cam kết sẽ cho bạn những trải nghiệm hết sức thú vị.',
                'quantity' => rand(10, 100),
                'input_price' => 6390000,
                'price' => 8390000,
                'image' => '[{"name":"public\/uploads\/products\/apple-watch-2-1.jpg"},{"name":"public\/uploads\/products\/apple-watch-2-2.jpg"},{"name":"public\/uploads\/products\/apple-watch-2-3.jpg"}]',
            ],
            [
                'id' => 3,
                'product_category_id' => 1,
                'name' => 'Apple Watch 3',
                'slug' => 'appple-watch-3',
                'description' => 'Sản phẩm này là Series thứ 3 của Apple, màn hình rộng 38mm hoặc 42mm, có khả năng chống nước ở độ sâu 50m, sở hữu cấu hình Chip W2, lõi kép mạnh mẽ. Thời gian sử dụng là 18 giờ.',
                'quantity' => rand(10, 100),
                'input_price' => 7190000,
                'price' => 10190000,
                'image' => '[{"name":"public\/uploads\/products\/apple-watch-3-1.jpg"},{"name":"public\/uploads\/products\/apple-watch-3-2.jpg"},{"name":"public\/uploads\/products\/apple-watch-3-3.jpg"}]',
            ],
            [
                'id' => 4,
                'product_category_id' => 2,
                'name' => 'Gear S3 Frontier',
                'slug' => 'gear-s3-frontier',
                'description' => 'Sản phẩm này có màn hình rộng 1,3 inch, độ phân giải 360x360 pixels, sử dụng hệ điều hành Tizen, thời hạn sử dụng lên tới 72 giờ, công suất pin là 380 mA',
                'quantity' => rand(10, 100),
                'input_price' => 5490000,
                'price' => 7490000,
                'image' => '[{"name":"public\/uploads\/products\/samsung-gear-s3-frontier-4-1.jpg"},{"name":"public\/uploads\/products\/samsung-gear-s3-frontier-4-2.jpg"},{"name":"public\/uploads\/products\/samsung-gear-s3-frontier-4-3.jpg"}]',
            ],
            [
                'id' => 5,
                'product_category_id' => 2,
                'name' => 'Gear S3 Classic',
                'slug' => 'gear-s3-classic',
                'description' => 'Gear S3 có màn hình rộng 1,3 inch, độ phân giải 360 x 360 Pixels được bảo vệ bởi tấm kính cường lực Gorilla glass 3, được trang bị tính năng chống nước theo tiêu chuẩn IP68, pin dung lượng 380mAh giá của sản phẩm khoảng 7.790.000 VNĐ. Gear S3 cũng là một lựa chọn hoàn hảo cho các tín đồ công nghệ.',
                'quantity' => rand(10, 100),
                'input_price' => 6790000,
                'price' => 7790000,
                'image' => '[{"name":"public\/uploads\/products\/samsung-gear-s3-classic-5-1.jpg"},{"name":"public\/uploads\/products\/x15Fb4TQtl1ek3vzeiX8CJAOvdCMWNk9tvF73fHU.jpg"},{"name":"public\/uploads\/products\/R6u039Mi2NklXLWF7UMXXmq7rObZaBwMsmJWgfxU.jpg"}]',
            ],
            [
                'id' => 6,
                'product_category_id' => 3,
                'name' => 'Xiaomi Huami Amazfit Stratos 3+',
                'slug' => 'xiaomi-huami-amazfit-stratos-3+',
                'description' => 'Đây là một sản phẩm thuộc phân khúc giá dưới 2.000.000 VNĐ của Xiaomi, đường kính mặt đồng hồ 40mm, độ dày của đồng hồ chỉ là 3,2 mm tối ưu hóa hiệu quả thẩm mỹ, có trang bị tính năng chống nước chuẩn IP67.',
                'quantity' => rand(10, 100),
                'input_price' => 4190000,
                'price' => 6190000,
                'image' => '[{"name":"public\/uploads\/products\/xiaomi-mijia-syb01-7-1.jpg"},{"name":"public\/uploads\/products\/xiaomi-mijia-syb01-7-2.jpg"},{"name":"public\/uploads\/products\/xiaomi-mijia-syb01-7-3.jpg"}]',
            ],
            [
                'id' => 7,
                'product_category_id' => 3,
                'name' => 'Xiaomi Huami Amazfit Nexo Verge 2',
                'slug' => 'xiaomi-huami-amazfit-nexo-verge-2',
                'description' => 'Đây là một sản phẩm thuộc phân khúc giá dưới 2.000.000 VNĐ của Xiaomi, đường kính mặt đồng hồ 40mm, độ dày của đồng hồ chỉ là 3,2 mm tối ưu hóa hiệu quả thẩm mỹ, có trang bị tính năng chống nước chuẩn IP67.',
                'quantity' => rand(10, 100),
                'input_price' => 3100000,
                'price' => 3800000,
                'image' => '[{"name":"public\/uploads\/products\/xiaomi-mi-band-2-8-1.jpg"},{"name":"public\/uploads\/products\/xiaomi-mi-band-2-8-2.jpg"}]',
            ],
            [
                'id' => 8,
                'product_category_id' => 4,
                'name' => 'Fibit Ionic Sliver',
                'slug' => 'fitbit-ionic-sliver',
                'description' => 'Sản phẩm này có sử dụng gia tốc kế-3 trục, thời hạn sử dụng pin khi bật GPS là 10 giờ thời gian sạc là từ 1-2 tiếng, có nhiều tính năng hiện đại nhằm theo dõi sức khỏe của bạn. Có cảm biến nhịp tim quang học, cảm biến ánh sáng xung quanh, cảm biến rung… Giá của mỗi chiếc Fitbit Ionic là 7.090.000 VNĐ.',
                'quantity' => rand(10, 100),
                'input_price' => 2199000,
                'price' => 2999000,
                'image' => '[{"name":"public\/uploads\/products\/fitbit-Ionic-9-1.jpg"},{"name":"public\/uploads\/products\/fitbit-Ionic-9-2.jpg"}]',
            ],
            [
                'id' => 9,
                'product_category_id' => 4,
                'name' => 'Fitbit Versa',
                'slug' => 'fitbit-versa',
                'description' => 'Có giá là 5.390.000 VNĐ cho một sản phẩm, thiết bị này có thiết kế bắt mắt, có khả năng lưu trữ hơn 300 bài hát trên đồng hồ. Có sử dụng cảm biến ánh sáng xung quanh, thời dung lượng pin lên tới 4 ngày thời gian sạc là 2 tiếng. Có tính năng chống nước ở độ sâu tới 50m.',
                'quantity' => rand(10, 100),
                'input_price' => 4390000,
                'price' => 5390000,
                'image' => '[{"name":"public\/uploads\/products\/fitbit-versa-10-1.jpg"},{"name":"public\/uploads\/products\/fitbit-versa-10-2.jpg"}]',
            ],
            [
                'id' => 10,
                'product_category_id' => 4,
                'name' => 'Fitbit Charge 2',
                'slug' => 'fitbit-charge-2',
                'description' => 'Thuộc phân khúc thấp hơn so với hai sản phẩm trên, chỉ tầm 3.690.000 VNĐ là bạn đã có thể sở hữu cho mình một chiếc Fitbit Charge 2. Đây là một sản phẩm đồng hồ thông minh theo dõi sức khỏe hot nhất hiện nay. Sản phẩm có màn hình rộng 0.84 inch giúp việc sử dụng gọn nhẹ và dễ dàng.',
                'quantity' => rand(10, 100),
                'input_price' => 2690000,
                'price' => 3690000,
                'image' => '[{"name":"public\/uploads\/products\/fitbit-charge-2-11-1.png"}]',
            ],
            [
                'id' => 11,
                'product_category_id' => 5,
                'name' => 'Huawei Honor Magic Watch 2',
                'slug' => 'huawei-honor-magic-watch2',
                'description' => 'Với phiên bản Honor Magic Watch 2 mới , Trên thế hệ mới Huawei nâng cấp với chip tự phát triển HUAWEI Kirin A1 đảm bảo hiệu suất cao và tiêu thụ điện năng cực kỳ thấp thiết kế chip kép và công nghệ tiết kiệm năng lượng thông minh, thời lượng sử dụng pin phục vụ bạn cả ngày lẫn đêm trong tối đa 2 tuần liên tục.',
                'quantity' => rand(10, 100),
                'input_price' => 3790000,
                'price' => 4790000,
                'image' => '[{"name":"public\/uploads\/products\/huawei-fit-12-1.png"}]',
            ]
        ];

        foreach ($products as $product) {
            Product::updateOrCreate (
                [
                    'id' => $product['id'],
                ],
                [
                    'product_category_id' => $product['product_category_id'],
                    'name' => $product['name'],
                    'slug' => $product['slug'],
                    'description' => $product['description'],
                    'quantity' => $product['quantity'],
                    'input_price' => $product['input_price'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                ]
                );
        }
    }
}
