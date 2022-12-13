<?php

use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\About::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'title' => 'Title 1',
                'content' => 'Content 1',
            ]
            );
    }
}
