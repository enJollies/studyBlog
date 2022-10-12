<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        

        $category->update($data);
        $category->fresh();

        return redirect()->route('admin.category.show', $category->id);
    }
}
