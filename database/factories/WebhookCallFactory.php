<?php

namespace Sidekicker\EventBridge\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Sidekicker\EventBridge\Models\WebhookCall;

class WebhookCallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebhookCall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => Str::uuid()->toString(),
            'name' => $this->faker->slug(2),
            'payload' => []
        ];
    }
}
