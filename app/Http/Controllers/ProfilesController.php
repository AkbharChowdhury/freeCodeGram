<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        $postCount = $user->posts()->count();
        return view('profiles.index', [
            'user' => $user,
            'postCount' => $postCount,
            'plural' => $postCount <=1 ? '' : 's'
        ]);
    }


}
