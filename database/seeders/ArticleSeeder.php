<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'content' => "lorem ipsum",
            'title' => "lorem ipsum",
            'featured_image' => "images/foto.jpg",
        ]);
    }
}
