<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(PostCategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentPostsTableSeeder::class);
        $this->call(CommentProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
