<?php

namespace App\Http\Controllers;

use App\Item;
use App\Classification;

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
            'price' => 'required|min:1',
            'description' => 'required',
            ]);

        Item::create([
            'name' => strtolower(request('name')),
            'classification_id' => request('classification_id'),
            'price' => request('price'),
            'description' => request('description'),
            ]);

        return redirect()->back();
    }

    public function show(Item $item)
    {
        $classification = $item->classification;

        return view('items/show', compact('item', 'classification'));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->back();
    }
}
