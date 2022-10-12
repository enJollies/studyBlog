<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $user = User::where('id', 1)->get()->first();



            Post::factory()
            ->for($user)
            ->for($categories->random())
            ->hasAttached($tags->random(2))
            ->create();



    }
}
