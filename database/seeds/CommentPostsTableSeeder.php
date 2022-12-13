<?php

use App\Models\CommentPost;
use Illuminate\Database\Seeder;

class CommentPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CommentPost::class, 10)->create();
    }
}
