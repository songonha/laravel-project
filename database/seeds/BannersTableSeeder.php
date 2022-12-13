<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Banner::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'title' => 'Title',
                'content' => 'Content',
                'image' => 'public/uploads/banners/banner.png',
            ]
            );
    }
}
