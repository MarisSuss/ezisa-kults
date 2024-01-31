<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)->create();

        Category::create([
            'title_en' => 'Uncategorized',
            'title_lv' => 'Bez kategorijas',
            'slug' => 'uncategorized',
        ]);

        Category::create([
            'title_en' => 'Praise Hedgehog',
            'title_lv' => 'Slavēt ezīti',
            'slug' => 'praise-hedgehog',
        ]);

        Category::create([
            'title_en' => 'Politics',
            'title_lv' => 'Politika',
            'slug' => 'politics',
        ]);

        Category::create([
            'title_en' => 'Economics',
            'title_lv' => 'Ekonomika',
            'slug' => 'economics',
        ]);

        Category::create([
            'title_en' => 'Sports',
            'title_lv' => 'Sports',
            'slug' => 'sports',
        ]);

        Category::create([
            'title_en' => 'Culture',
            'title_lv' => 'Kultūra',
            'slug' => 'culture',
        ]);

        Category::create([
            'title_en' => 'Science',
            'title_lv' => 'Zinātne',
            'slug' => 'science',
        ]);

        Post::create([
            'title_en' => 'The first post',
            'title_lv' => 'Pirmais ieraksts',
            'content_en' => 'This is the first post',
            'content_lv' => 'Šis ir pirmais ieraksts',
            'date' => date('Y-m-d'),
            'slug' => 'the-first-post',
            'user_id' => $user[0]->id,
            'category_id' => 1,
        ]);

        Post::create([
            'title_en' => 'The second post',
            'title_lv' => 'Otrais ieraksts',
            'content_en' => 'This is the second post',
            'content_lv' => 'Šis ir otrais ieraksts',
            'date' => date('Y-m-d'),
            'slug' => 'the-second-post',
            'user_id' => $user[1]->id,
            'category_id' => 1,
        ]);

        Post::create([
            'title_en' => 'The third post',
            'title_lv' => 'Trešais ieraksts',
            'content_en' => 'This is the third post',
            'content_lv' => 'Šis ir trešais ieraksts',
            'date' => date('Y-m-d'),
            'slug' => 'the-third-post',
            'user_id' => $user[2]->id,
            'category_id' => 1,
        ]);
    }
}
