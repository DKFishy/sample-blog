<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample users
        $users = User::factory()->count(5)->create();

        // Loop through each user to create posts
        $users->each(function ($user) use ($users) {
            // Create 2-4 posts per user
            $posts = Post::factory()->count(rand(2, 4))->create([
                'user_id' => $user->id,
            ]);

            // Loop through each post to create comments
            $posts->each(function ($post) use ($users) {
                // Create 3-6 comments per post from random users
                $commentCount = rand(3, 6);
                for ($i = 0; $i < $commentCount; $i++) {
                    Comment::factory()->create([
                        'post_id' => $post->id,
                        'user_id' => $users->random()->id, // Get a random user from the created users
                    ]);
                }
            });
        });
    }
}
