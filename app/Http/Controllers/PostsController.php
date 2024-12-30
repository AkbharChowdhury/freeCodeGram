<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;


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

    function store(StorePostRequest $request): void
    {
        $img = $request->get("image");
//        $img = $request->image("image");

        dd($img, $request->all());
//        $this->savePost($request);
        auth()->user()->posts()->create([
            'caption' => request->input('caption'),
            'image' => request->input('image')
        ]);

    }

    private function savePost(StorePostRequest $request)
    {
//        auth()->user()->posts()->create([
//            'caption' => $request->input('caption'),
//            'image' => $request->input('image')
//        ]);

    }
}
