<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\ImageHandler;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index()
    {
        $users = Auth::user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')
            ->latest()
            ->paginate(3);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');

    }

    function store(StorePostRequest $request)
    {

        $imagePath = ImageHandler::save(folder: 'uploads');
        ImageHandler::resize(imagePath: $imagePath);

        Auth::user()->posts()->create([
            'caption' => $request->input('caption'),
            'image' => $imagePath
        ]);
        return redirect(route('profiles.show', Auth::id()))
            ->withSuccess('Post Added');

    }


    function show(Post $post)
    {
        return view('posts.show', compact('post'));

    }

}
