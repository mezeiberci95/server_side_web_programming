<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'author' => $this->faker->name(),
            'image_url' => $this->faker->image('storage/app/public/images', 400, 400, 'dogs'),
            'text' => $this->faker->paragraph(10, true),
            //
        ];
    }
}
