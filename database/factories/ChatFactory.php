<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class MessageFactory extends Factory
{

    protected $table = 'chats';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'message' => Str::random(20),
            'uuid' => Str::uuid()->toString(),
            'sent_to_user_id' => 15,
            'user_id' => 20
        ];
    }
}
