<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'id' => 1,
                'post_category_id' => 1,
                'user_id' => 1,
                'title' => 'Hướng dẫn chuyển giao diện sang tiếng Anh cho Xiaomi Huami Amazfit Nexo Verge 2',
                'slug' => Str::slug('Hướng dẫn chuyển giao diện sang tiếng Anh cho Xiaomi Huami Amazfit Nexo Verge 2'),
                'content' => 'Do mới chỉ được phân phối tại thị trường nội địa Trung Quốc, Amazfit Nexo Verge 2 mặc định sử dụng ngôn ngữ Trung Quốc để hiển thị ngay khi kết nối . Tuy nhiên, chiếc smartwatch nền Android 8.1 nên có hỗ trợ ngôn ngữ tiếng Anh ẩn . Bạn đọc có thể theo dõi hướng dẫn dưới đây để có thể chuyển sang sử dụng giao diện tiếng Anh bằng cách vào Cài đặt ẩn Android trên máy .',
                'image' => 'public/uploads/posts/change-language-amazfit-nexo-1.jpg',
            ],
            [
                'id' => 2,
                'post_category_id' => 1,
                'user_id' => 1,
                'title' => 'Hướng dẫn fix lỗi font tiếng việt cho Huami Amazfit GTR Phiên bản Quốc Tế',
                'slug' => Str::slug('Hướng dẫn fix lỗi font tiếng việt cho Huami Amazfit GTR Phiên bản Quốc Tế'),
                'content' => 'Hiện tại do còn mới nên Huami chưa thêm ngôn ngữ tiếng việt , thư viện font tiếng việt cho Đồng hồ thông minh Huami Amazfit GTR phiên bản quốc tế. Đây là cách để hiển thị đầy đủ thông báo tiếng việt có dấu 1 cách dễ dàng cho anh em.
                Đối với phiên bản nội địa chỉ có ngôn ngữ Trung Quốc , và lỗi thông báo tiếng việt có dấu vẫn chưa có cách fix được. Nên anh em mua thì chú ý tránh mua nhầm bản nội địa thị trường trung quốc..',
                'image' => 'public/uploads/posts/huongdan1.jpg',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                [
                    'id' => $post['id'],
                ],
                [
                    'post_category_id' => $post['post_category_id'],
                    'user_id' => $post['user_id'],
                    'title' => $post['title'],
                    'slug' => $post['slug'],
                    'content' => $post['content'],
                    'image' => $post['image'],
                ]
                );
        }
    }
}
