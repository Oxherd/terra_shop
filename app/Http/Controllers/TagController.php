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

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            ]);

        Tag::create([
            'name' => request('name'),
            ]);

        return redirect()->back();
    }

    public function update(Tag $tag)
    {
        $this->validate(request(), [
            'name' => 'required',
            ]);

        $tag->update([
            'name' => request('name'),
            ]);

        return redirect('/classifications/'.$tag->items->first()->classification->name);
    }

    public function destroy(Tag $tag)
    {
        $tag->items()->detach();

        $tag->delete();

        if (url()->full() == url()->previous()) {
            return redirect()->home();
        }

        return redirect()->back();
    }
}
