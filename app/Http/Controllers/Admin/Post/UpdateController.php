<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {

        $data = $request->validated();

        $data = $this->service->putImagesInStorage($data);

        $updatedPost = $this->service->updatePost($data, $post);
        return redirect()->route('admin.post.show', $updatedPost->id);

    }
}
