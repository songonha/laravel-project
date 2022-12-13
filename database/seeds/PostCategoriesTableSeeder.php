<?php

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postCategories = [
            [
                'id' => 1,
                'name' => 'Hướng dẫn',
                'slug' => 'huong-dan',
            ],
            [
                'id' => 1,
                'name' => 'Chia sẻ',
                'slug' => 'chia-se',
            ],
        ];

        foreach ($postCategories as $postCategory) {
            PostCategory::updateOrCreate(
                [
                    'id' => $postCategory['id'],
                ],
                [
                    'name' => $postCategory['name'],
                    'slug' => $postCategory['slug'],
                ]
                );
        }
    }
}
