<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    function create()
    {
        return view('posts.create');

    }
}
