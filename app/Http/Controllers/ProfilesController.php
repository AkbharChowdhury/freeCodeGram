<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreProfileRequest;
use App\Models\ImageHandler;
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
    private function getImagePath()
    {
        $imagePath = ImageHandler::uploadAndGetImagePath(key: 'image', folder: 'profile');
        ImageHandler::fitImage(imagePath: $imagePath, size: 1000);
        return $imagePath;

    }
    public function update(User $user)
    {

        $this->isAuthorised($user);
        $data = $this->validateForm();

        dd($data);


        if (request('image')){
//            $imagePath = ImageHandler::uploadAndGetImagePath('image', 'profile');
//            ImageHandler::fitImage(  imgPath:  $imagePath, folder: 'profile', size: 1000);

//            $imagePath = ImageHandler::uploadAndGetImagePath(key: 'image', folder: 'profile');
//            ImageHandler::fitImage(imagePath: $imagePath, size: 1000);

        }

        $imagePath = request('image') ? $this->getImagePath() : '';



//
//        dd($data);
        auth()->user()->profile()->update(array_merge($data, ['image', $imagePath]));
        return redirect(route('profile.show', auth()->user()->id))
            ->withSuccess('Profile Updated');
    }

}
