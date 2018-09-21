<?php

use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([

            [
                'name' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'slug' => 'the-dark-knight',
                'release_date' => date("Ymd", strtotime("-1 week")),
                'rating' => 4,
                'ticket_price' => 20,
                'country' => 'USA',
                'genre' => 'Action,Drama',
                'photo' => 'default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'slug' => 'the-shawshank-redemption',
                'release_date' => date("Ymd", strtotime("-2 weeks")),
                'rating' => 3,
                'ticket_price' => 22,
                'country' => 'USA',
                'genre' => 'Drama',
                'photo' => 'default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'slug' => 'the-godfather',
                'release_date' => date("Ymd"),
                'rating' => 5,
                'ticket_price' => 27,
                'country' => 'USA',
                'genre' => 'Crime,Drama',
                'photo' => 'default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],           
        ]);
    }
}
