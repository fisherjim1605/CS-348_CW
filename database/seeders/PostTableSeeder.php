<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

use DateTime;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = new Post;
        $p1->user_id = 1;
        $p1->title = "Test post 1";
        $p1->info = "This is a test post";
        $p1->uploadTime = new DateTime();
        $p1->save();
    
        $p2 = new Post;
        $p2->user_id = 2;
        $p2->title = "Test post 2";
        $p2->info = "This is also a test post";
        $p2->uploadTime = new DateTime();
        $p2->save();

        $posts = Post::factory()->count(10)->create();
    }
}
