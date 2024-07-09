<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name(),
            'image' => 'tracks/images/test.jpg',
            'music' => 'tracks/musics/test.mp3',
            'display' => $this->faker->boolean(90),
            'play_count' => $this->faker->numberBetween(0,10_000_000)
        ];
    }
}
