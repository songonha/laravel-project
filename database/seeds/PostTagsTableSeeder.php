<?php

use Illuminate\Database\Seeder;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PostTag::class, 5)->create();
    }
}
