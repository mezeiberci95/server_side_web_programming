<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Storage;

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
            //'author' => $this->faker->name(),
            'image_url' => $this->faker->image(Storage::path('public') . '/images/post_images', 400, 400, 'dogs', false),
            'text' => $this->faker->paragraph(10, true),
            //
        ];
    }
}
