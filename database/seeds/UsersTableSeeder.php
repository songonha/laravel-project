<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'id' => 1,
                'name' => 'Dương Linh',
                'dateOfBirth' => date_create('08-08-1998'),
                'gender' => 1,
                'address' => 'Hanoi',
                'phone' => '0368616260',
                'email' => 'linhdn1198@gmail.com',
                'password' => Hash::make('password'), // password
                'role' => 1,
                'image' => User::IMAGE_MALE,
        ]);
        factory(App\Models\User::class, 10)->create();
    }
}
