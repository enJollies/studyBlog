<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(10)->create();
        $categories = Category::factory(5)->create();
        $admin = Role::factory()->create(['title' => 'admin']);
        $user = Role::factory()->create(['title' => 'user']);

        User::factory()
        ->has(
            Post::factory()
            ->count(4)
            ->for($categories
            ->random())
            ->hasAttached($tags->random(2))
            )
        ->for($admin)
        ->create(['email' => 'admin@admin']);

        User::factory()
        ->has(
            Post::factory()
            ->count(2)
            ->for($categories
            ->random())
            ->hasAttached($tags->random(2))
            )
        ->for($user)
        ->create(['email' => 'user@user']);

        User::factory()
        ->count(9)
        ->has(
            Post::factory()
            ->count(2)
            ->for($categories
            ->random())
            ->hasAttached($tags->random(2))
            )
        ->for($user)
        ->create();




    }
}
