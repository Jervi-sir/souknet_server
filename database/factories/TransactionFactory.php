<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        $order = Order::random();
        return [
            'order_id' => $order->id,
            'payment_method_id' => PaymentMethod::random()->id,
            'amount' => $order->ordered_price,
            'transaction_id' => $this->faker->uuid,
            'status' => $this->faker->randomElement([0, 1, 2, 3]), // 0: failed, 1: success, 2: pending, 3: refunded
        ];
    }
}
