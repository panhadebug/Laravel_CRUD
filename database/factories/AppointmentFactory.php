<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;


class AppointmentFactory extends Factory
{

    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id ?? Customer::factory(),
            'service_id' => Service::inRandomOrder()->first()->id ?? Service::factory(),
            'appointment_time' => $this->faker->dateTimeBetween('+1 days', '+30 days'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
