<?php

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = [
            [
                'id' => 1,
                'name' => 'Apple',
                'slug' => 'apple',
            ],
            [
                'id' => 2,
                'name' => 'Samsung',
                'slug' => 'samsung',
            ],
            [
                'id' => 3,
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
            ],
            [
                'id' => 4,
                'name' => 'Fitbit',
                'slug' => 'fitbit',
            ],
            [
                'id' => 5,
                'name' => 'Huawei Fit',
                'slug' => 'huawei-fit',
            ],
        ];

        foreach ($productCategories as $productCategorie) {
            ProductCategory::updateOrCreate(
                [
                    'id' => $productCategorie['id'],
                ],
                [
                    'name' => $productCategorie['name'],
                    'slug' => $productCategorie['slug'],
                ]
                );
        }
    }
}
