<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Comment $comment)
    {

        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
