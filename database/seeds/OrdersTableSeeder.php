<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => '2',
            'status_shipment' => 'Pendiente',
            'address' => 'Calle Juarez 1 Col. Cuauhtemoc',
            'state' => 'Ciudad de Mexico',
            'city' => 'Miguel Hidalgo',
            'zip' => '11585',
        ]);

        Order::create([
            'user_id' => '2',
            'status_shipment' => 'En preparación',
            'address' => 'Calle Juarez 1 Col. Cuauhtemoc',
            'state' => 'Ciudad de Mexico',
            'city' => 'Miguel Hidalgo',
            'zip' => '11585',
        ]);

        Order::create([
            'user_id' => '2',
            'status_shipment' => 'Enviado',
            'address' => 'Calle Juarez 1 Col. Cuauhtemoc',
            'state' => 'Ciudad de Mexico',
            'city' => 'Miguel Hidalgo',
            'zip' => '11585',
        ]);
    }
}
