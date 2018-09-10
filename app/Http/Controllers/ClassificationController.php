<?php

namespace App\Http\Controllers;

use App\Classification;

class ClassificationController extends Controller
{
    public function index()
    {
        $classifications = Classification::all();
        $categories = $classifications->first()->category->all();

        return view('classifications/index', compact(['classifications', 'categories']));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'category_id' => 'required',
            ]);

        Classification::create([
            'name' => strtolower(request('name')),
            'category_id' => request('category_id'),
            ]);

        return redirect()->back();
    }

    public function show(Classification $classification)
    {
        return view('classifications/show', compact('classification'));
    }

    public function update(Classification $classification)
    {
        $this->validate(request(), [
            'name' => 'required',
            ]);

        $classification->update([
            'name' => strtolower(request('name')),
            ]);

        return redirect('/categories/'.$classification->category->name);
    }

    public function destroy(Classification $classification)
    {
        $classification->items()->each(function ($item) {
            $item->tags()->detach();
            $item->delete();
        });

        $classification->delete();

        if (url()->full() == url()->previous()) {
            return redirect('/categories/'.$classification->category->name);
        }

        return redirect()->back();
    }
}
