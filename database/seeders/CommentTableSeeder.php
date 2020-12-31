<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

use DateTime;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->user_id = 1;
        $c->post_id = 1;
        $c->message = 'Hello World!';
        $c->uploadTime = new DateTime();

        $comments = Comment::factory()->count(10)->create();       
    }
}
