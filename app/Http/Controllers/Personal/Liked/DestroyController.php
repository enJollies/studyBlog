<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($liked_post)
    {
        auth()->user()->likedPosts()->detach($liked_post);

        return redirect()->route('personal.likedPost.index');
    }
}
