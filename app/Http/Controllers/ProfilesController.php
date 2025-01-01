<?php

namespace App\Http\Controllers;

use App\Models\ImageHandler;
use App\Models\MyHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = Auth::user() ? Auth::user()->following->contains($user->id) : false;
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        $postCount = $user->posts()->count();
        $plural = MyHelper::plural($postCount);

        return view('profiles.index', compact('user', 'postCount', 'plural', 'follows', 'followersCount', 'followingCount'));

    }

    public function edit(User $user)
    {
        $this->isAuthorised($user);
        return view('profiles.edit', compact('user'));


    }

    private function isAuthorised(User $user): void
    {
        $this->authorize('update', $user->profile);
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

    private function saveAndGetImagePath()
    {
        $imagePath = ImageHandler::save(key: 'image', folder: 'profile');
        ImageHandler::resize(imagePath: $imagePath, size: 1000);
        return $imagePath;

    }

    public function update(User $user)
    {
        $this->isAuthorised($user);
        $data = $this->validateForm();
        $imagePath = request('image') ? $this->saveAndGetImagePath() : $user->profile->image;

        Auth::user()->profile()->update(array_merge($data, ['image' => $imagePath]));

        return redirect(route('profiles.show', Auth::id()))
            ->withSuccess('Profile Updated');
    }

}
