<?php

namespace App\Http\Controllers;

use App\Item;
use App\Classification;
use App\Tag;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $classifications = Classification::all();

        return view('items/index', compact('items', 'classifications'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:items',
            'classification_id' => 'required',
            'picture' => 'required',
            'price' => 'required|min:1',
            'description' => 'required',
            ]);

        Item::create([
            'name' => request('name'),
            'classification_id' => request('classification_id'),
            'picture' => request('picture'),
            'price' => request('price'),
            'description' => request('description'),
            ]);

        return redirect()->back();
    }

    public function show(Item $item)
    {
        $classification = $item->classification;
        $tags = Tag::all();

        return view('items/show', compact('item', 'classification', 'tags'));
    }

    public function update(Item $item)
    {
        $this->validate(request(), [
            'name' => 'required',
            'picture' => 'required',
            'price' => 'required|min:1',
            'description' => 'required',
            ]);

        $item->update([
            'name' => request('name'),
            'picture' => request('picture'),
            'price' => request('price'),
            'description' => request('description'),
            ]);

        return redirect()->back();
    }

    public function destroy(Item $item)
    {
        $url = '/classifications/'.$item->classification->name;

        $item->tags()->detach();

        $item->delete();

        return redirect($url);
    }

    public function attach(Item $item, Tag $tag)
    {
        if ($item->tags()->where('name', $tag->name)->exists()) {
            return redirect()->back();
        }

        $item->tags()->attach($tag->id);

        return redirect()->back();
    }

    public function detach(Item $item, Tag $tag)
    {
        $item->tags()->detach($tag->id);

        return redirect()->back();
    }
}
