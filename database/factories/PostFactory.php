<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use DateTime;

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
            'title' => $this->faker->sentence,
            //randomElement(
            //    ["Found this image, thought I'd share!", 
            //    "Check out this article!",
            //    "Watch this funny video that I found!", 
            //    "Insert title here"]),
            'info' =>  $this->faker->paragraph,
            //randomElement(
            //    ["https://www.youtube.com/watch?v=dQw4w9WgXcQ", 
            //    "https://deadspin.com/florida-man-arrested-for-practicing-karate-by-kicking-s-1825698550",
            //    "Sike, there is no post", 
            //    "Writing fake posts is hard"]),
            'uploadTime' => new DateTime(),
            'user_id' => function () { //Take all ids from Users, put into an array, and retrieve random element
                $users = User::all()->pluck('id')->toArray();
                return $this->faker->randomElement($users);
            }
        ];
    }
}
