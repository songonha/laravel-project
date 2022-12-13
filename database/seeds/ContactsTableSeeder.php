<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Contact::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'address' => 'Hà Nội',
                'phone' => '0168616260',
                'email' => 'linhdn1198@gmail.com',
            ]
            );
    }
}
