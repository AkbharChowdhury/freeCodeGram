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

    function store(StorePostRequest $request)
    {

        auth()->user()->posts()->create([
            'caption' => $request->input('caption'),
            'image' => $request->image->store('uploads','public')
        ]);
        return redirect(route('profile.show', auth()->user()->id));
    }
}
