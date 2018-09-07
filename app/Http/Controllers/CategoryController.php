<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories/index', compact('categories'));
    }

    public function store()
    {
        $this->validate(
            request(),
            [
            'name' => 'required|unique:categories',
            ],
            [
            'name.unique' => '名稱不可重複',
            ]
        );

        Category::create([
            'name' => strtolower(request('name')),
            ]);

        return redirect()->home();
    }

    public function show(Category $category)
    {
        // dd($category->classifications);

        return view('categories/show', compact('category'));
    }

    public function update(Category $category)
    {
        $this->validate(request(), [
            'name' => 'required|unique:categories',
            ]);

        $category->update([
            'name' => strtolower(request('name')),
            ]);

        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->classifications()->delete();

        $category->delete();

        return redirect()->home();
    }
}
