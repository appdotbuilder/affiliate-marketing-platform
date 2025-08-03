<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraphs(2, true),
            'thumbnail' => $this->faker->imageUrl(600, 400, 'education'),
            'learning_objectives' => $this->faker->paragraphs(3, true),
            'requirements' => $this->faker->paragraphs(2, true),
            'estimated_duration' => $this->faker->numberBetween(300, 6000), // in minutes
            'certificate_enabled' => $this->faker->boolean(80),
            'certificate_template' => 'default',
            'sort_order' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['active', 'inactive', 'draft']),
        ];
    }

    /**
     * Indicate that the course is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }
}