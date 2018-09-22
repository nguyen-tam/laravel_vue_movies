<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([

            [
                'content' => "I had the honor of watching TDK during a screening and was completely blown away! This isn't just the best Batman movie ever made, this is one of the best movie ever made. Everything in this film is excellent, not one piece of annoyance.",
                'film_id' => 1,
                'name' => 'tam'
            ],
            [
                'content' => "I have never seen such an amazing film since I saw The Shawshank Redemption. Shawshank encompasses friendships, hardships, hopes, and dreams. And what is so great about the movie is that it moves you, it gives you hope. Even though the circumstances between the characters and the viewers are quite different, you don't feel that far removed from what the characters are going through.",
                'film_id' => 2,
                'name' => 'tam'
            ],
            [
                'content' => "Tell me a movie that is more famous than this. Tell me a movie that has had more parodies spinned off its storyline than this. Tell me one movie that has been as quoted as a much as this. The answer is you can't. No movie has had as much of an impact as The Godfather has had ever since it was released.",
                'film_id' => 3,
                'name' => 'tam'
            ],           
        ]);
    }
}
