<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreProfileRequest;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $postCount = $user->posts()->count();
        return view('profiles.index', [
            'user' => $user,
            'postCount' => $postCount,
            'plural' => $postCount <= 1 ? '' : 's'
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));


    }


    private function validateForm(): array
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => ''

        ]);

    }

    public function update(User $user)
    {
        $data = $this->validateForm();
        auth()->user()->profile()->update($data);
        return redirect(route('profile.show', auth()->user()->id))
            ->withSuccess('Profile Updated');
    }

}
