<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'coupon_code' => $this->faker->name(),
            'coupon_value' => rand(1, 9999),
            'coupon_type' => 'percentage',
            'status' => 'active',
            'expiry_at' => Carbon::now()->format('Y-m-d'),
            'is_used' => rand(0, 1),
            'slug' => Str::random(10),
        ];
    }
}
