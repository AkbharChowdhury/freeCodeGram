<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\ImageHandler;
use App\Models\Post;



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

        $imgPath = ImageHandler::getImagePath($request);
        ImageHandler::fitImage($imgPath);

        auth()->user()->posts()->create([
            'caption' => $request->input('caption'),
            'image' => $imgPath
        ]);
        return redirect(route('profile.show', auth()->user()->id))
            ->withSuccess('Post Added');

    }


    function show(Post $post)
    {
        return view('posts.show', compact('post'));

    }

}
