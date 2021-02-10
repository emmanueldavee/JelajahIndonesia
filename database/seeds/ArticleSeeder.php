<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Taman Komodo',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/komodo.jpg',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'Candi Borobudur',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/borobudur.jpg',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'Gunung Bromo',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/bromo.jpg',
                'user_id' => 1,
                'category_id' => 3
            ],
            [
                'title' => 'Gili Trawangan',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/gilitrawangan.jpg',
                'user_id' => 2,
                'category_id' => 1
            ],
            [
                'title' => 'Kawah Ijen',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/kawahijen.jpg',
                'user_id' => 2,
                'category_id' => 3
            ],
            [
                'title' => 'Labuan Bajo',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/labuanbajo.jpg',
                'user_id' => 2,
                'category_id' => 1
            ],
            [
                'title' => 'Gunung Merapi',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/merapi.jpg',
                'user_id' => 2,
                'category_id' => 3
            ],
            [
                'title' => 'Monkey Forest',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/monkeyforest.jpg',
                'user_id' => 1,
                'category_id' => 6
            ],
            [
                'title' => 'Pink Beach',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/pinkbeach.jpg',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Candi Prambanan',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/prambanan.jpg',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'Raja Ampat',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur obcaecati ratione maxime itaque eligendi impedit omnis nulla nostrum velit. Nemo, saepe adipisci! Mollitia deserunt dicta repellat explicabo, assumenda quis iusto officia reiciendis deleniti illo provident! Debitis distinctio dolor repudiandae praesentium.',
                'image' => 'articles/rajaampat.jpg',
                'user_id' => 2,
                'category_id' => 1
            ],
        ]);
    }
}
