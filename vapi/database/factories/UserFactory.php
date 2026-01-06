<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    private const DEFAULT_PASSWORD = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    private const REMEMBER_TOKEN_LENGTH = 10;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => self::DEFAULT_PASSWORD,
            'remember_token' => Str::random(self::REMEMBER_TOKEN_LENGTH),
        ];
    }

    public function unverified(): self
    {
        return $this->state(['email_verified_at' => null]);
    }
}
