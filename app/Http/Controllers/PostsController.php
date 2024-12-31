<?php

namespace App\Http\Controllers;
//use Intervention\Image\Laravel\Facades\Image;

use App\Http\Requests\StorePostRequest;
use http\Env\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function create()
    {
        return view('posts.create');

    }

    function store(StorePostRequest $request)
    {
        $imgPath = $this->getImagePath($request);
        $this->fitImage($imgPath);
        
        auth()->user()->posts()->create([
            'caption' => $request->input('caption'),
            'image' => $imgPath
        ]);
        return redirect(route('profile.show', auth()->user()->id));
    }


    private function fitImage(string $imgPath)
    {
        Image::make(public_path('storage/' . $imgPath))
            ->fit(1200, 1200)
            ->save();
    }

    private function getImagePath(StorePostRequest $request)
    {
        return $request->image->store('uploads', 'public');

    }
}
