<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
            'star' => 'required|min:1|max:5',
            ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'item_id' => request('item_id'),
            'body' => request('body'),
            'star' => request('star'),
            ]);

        return redirect()->back();
    }
}
