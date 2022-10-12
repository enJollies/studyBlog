<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Jobs\StoreUserJob;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        StoreUserJob::dispatch($data);
        
        return redirect()->route('admin.user.index');
    }
}
