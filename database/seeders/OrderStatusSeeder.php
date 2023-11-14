<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* when we use shipping, we add order status proccessing and dispatched */
        $ordersStatus = ['cart', 'completed'];
        foreach ($ordersStatus as $status) {
            OrderStatus::create(['name' => $status]);
        }
    }
}
