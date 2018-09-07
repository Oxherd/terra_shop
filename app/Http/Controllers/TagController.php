<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags/index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        return view('tags/show', compact('tag'));
    }
}
