<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['tagsCount'] = Tag::all()->count();

        return view('admin.main.index', compact('data'));
    }
}
