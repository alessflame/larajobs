<?php

namespace Database\Factories;

use App\Models\JobAd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobAd>
 */
class JobAdFactory extends Factory
{

    protected $model = JobAd::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(140),
            'user_id' => fake()->numberBetween(1, 2),
            'category_id' => fake()->numberBetween(1, 2),
            "img_url" => "nessuno",
            "ral" => 1200,
            "skills" => '{"soft":["lavoro in team", "problem solving", "creatività"],
                        "hard":["react","SEO","Laravel"]}'
        ];
    }
}
