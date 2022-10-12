<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $mostLikedPosts = Post::withCount('likedUsers')
        ->orderBy('liked_users_count', 'DESC')
        ->get()
        ->take(4);

        $latestsPosts = Post::latest()->get()->take(4);

        return view('post.index', compact('posts', 'mostLikedPosts', 'latestsPosts'));
    }
}
