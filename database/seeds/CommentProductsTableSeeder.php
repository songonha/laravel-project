<?php

use Illuminate\Database\Seeder;

class CommentProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CommentProduct::class, 50)->create();
    }
}
