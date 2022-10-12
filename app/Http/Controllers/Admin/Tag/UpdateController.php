<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Tag\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();


        $tag->update($data);
        $tag->fresh();

        return redirect()->route('admin.tag.show', $tag->id);
    }
}
