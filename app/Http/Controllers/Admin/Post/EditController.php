<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tagIds = $post->tags->modelKeys();

        return view('admin.post.edit', compact('post', 'tagIds', 'categories', 'tags'));
    }
}
