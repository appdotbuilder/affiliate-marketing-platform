<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 99000, 2000000);
        $originalPrice = $price + $this->faker->randomFloat(2, 50000, 500000);
        
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(3, true),
            'short_description' => $this->faker->sentence(10),
            'price' => $price,
            'original_price' => $originalPrice,
            'image' => $this->faker->imageUrl(400, 300, 'business'),
            'type' => $this->faker->randomElement(['course', 'ebook', 'software', 'template', 'other']),
            'status' => $this->faker->randomElement(['active', 'inactive', 'draft']),
            'features' => [
                'Akses seumur hidup',
                'Video berkualitas HD',
                'Sertifikat digital',
                'Community support',
                'Update gratis'
            ],
            'has_certificate' => $this->faker->boolean(70),
            'duration_hours' => $this->faker->numberBetween(5, 100),
            'total_lessons' => $this->faker->numberBetween(10, 50),
        ];
    }

    /**
     * Indicate that the product is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }
}