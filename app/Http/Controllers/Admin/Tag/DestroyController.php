<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}
