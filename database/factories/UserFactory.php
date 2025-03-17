<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'role' => fake()->randomElement(['admin', 'regular']),
            'balance' => fake()->numberBetween($min = 1000000, $max = 10000000),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Configures the factory to execute the command after creating one User.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            Order::factory()->count(rand(1, 3))->create([
                'user_id' => $user->getId(),
            ]);
            WishList::factory(1)->create(['user_id' => $user->getId()]);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
