<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('posts')->delete();
        DB::table('tags')->delete();

        Storage::delete(Storage::files('public/images/post_images'));

        $user = User::create([
            'name' => "Bertalan",
            'email' => "bertalan@mail.com",
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('q'),
            'remember_token' => Str::random(10),
        ]);
        Post::factory(5)->create(['user_id' => $user]);
        Tag::factory(5)->create();

        Post::all()->each(function ($post) {
            $ids = Tag::all()->random(rand(1, Tag::count()))->pluck('id')->toArray();
            $post->tags()->attach($ids);
        });
    }
}
