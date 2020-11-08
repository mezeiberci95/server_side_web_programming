<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        DB::table('tags')->delete();

        Storage::delete(Storage::files('public/images/post_images'));

        Post::factory(5)->create();
        Tag::factory(5)->create();

        Post::all()->each(function ($post) {
            $ids = Tag::all()->random(rand(1, Tag::count()))->pluck('id')->toArray();
            $post->tags()->attach($ids);
        });
    }
}
