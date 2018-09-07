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

    public function destroy(Classification $classification)
    {
        $classification->items()->delete();

        $classification->delete();

        return redirect()->back();
    }
}
