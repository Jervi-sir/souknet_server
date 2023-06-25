<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderCouponFactory extends Factory
{
    protected $model = OrderCoupon::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'coupon_id' => Coupon::inRandomOrder()->first()->id,
        ];
    }
}
