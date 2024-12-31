<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index( User $user)
    {
//        $user = User::findOrFail($user);
        $postCount = $user->posts()->count();
        return view('profiles.index', [
            'user' => $user,
            'postCount' => $postCount,
            'plural' => $postCount <=1 ? '' : 's'
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));


    }

    public function update(StoreProfileRequest $request)
    {
        dd($request->all());

    }

//php artisan make:request StoreProfileRequest




}
