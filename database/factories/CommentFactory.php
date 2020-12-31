<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

use DateTime;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            //randomElement(
            //    ["Funny post!", "This is so relatable!",
            //    "Not funny, didn't laugh"]),
            'uploadTime' => new DateTime(),
            'user_id' => function () { //Take all ids from Users, put into an array, and retrieve random element
                $users = User::all()->pluck('id')->toArray();
                return $this->faker->randomElement($users);
            },
            'post_id' => function () { //Take all ids from Posts, put into an array, and retrieve random element
                $posts = Post::all()->pluck('id')->toArray();
                return $this->faker->randomElement($posts);
            },
        ];
    }
}
