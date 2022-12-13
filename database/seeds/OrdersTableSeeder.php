<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'id' => 1,
                'user_id' => rand(1, 10),
                'total' => 1000000,
                'status' => 1,
            ],
            [
                'id' => 2,
                'user_id' => rand(1, 10),
                'total' => 2000000,
                'status' => 1,
            ],
            [
                'id' => 3,
                'user_id' => rand(1, 10),
                'total' => 3000000,
                'status' => 1,
            ],
            [
                'id' => 4,
                'user_id' => rand(1, 10),
                'total' => 4000000,
                'status' => 1,
            ],
            [
                'id' => 5,
                'user_id' => rand(1, 10),
                'total' => 5000000,
                'status' => 1,
            ],
            [
                'id' => 6,
                'user_id' => rand(1, 10),
                'total' => 6000000,
                'status' => 1,
            ],
            [
                'id' => 7,
                'user_id' => rand(1, 10),
                'total' => 7000000,
                'status' => 1,
            ],
            [
                'id' => 8,
                'user_id' => rand(1, 10),
                'total' => 8000000,
                'status' => 0,
            ],
            [
                'id' => 9,
                'user_id' => rand(1, 10),
                'total' => 9000000,
                'status' => 1,
            ],
            [
                'id' => 10,
                'user_id' => rand(1, 10),
                'total' => 10000000,
                'status' => 1,
            ],
        ];

        // foreach ($orders as $order) {
        //     Order::updateOrCreate(
        //         [
        //             'id' => $order['id'],
        //         ],
        //         [
        //             'user_id' => $order['user_id'],
        //             'total' => $order['total'],
        //             'status' => $order['status'],
        //         ]
        //         );
        // }

        factory(App\Models\Order::class, 200)->create();
    }
}
