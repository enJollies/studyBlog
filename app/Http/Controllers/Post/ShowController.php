<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        $publicationDate = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category->id)
        ->where('id', '!=', $post->id)
        ->get()
        ->take(3);
        
        return view('post.show', compact('post', 'publicationDate', 'relatedPosts'));
    }
}
