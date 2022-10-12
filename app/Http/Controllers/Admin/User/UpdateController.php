<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);
        $user->fresh();

        return redirect()->route('admin.user.show', $user->id);
    }
}
