<?php
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id' => 1,
                'name' => 'Apple',
            ],
            [
                'id' => 2,
                'name' => 'Samsung',
            ],
            [
                'id' => 3,
                'name' => 'Xiaomi',
            ],
            [
                'id' => 4,
                'name' => 'Fitbit',
            ],
            [
                'id' => 5,
                'name' => 'Huawei',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(
                [
                    'id' => $tag['id'],
                ],
                [
                    'name' => $tag['name'],
                ]
                );
        }
    }
}
