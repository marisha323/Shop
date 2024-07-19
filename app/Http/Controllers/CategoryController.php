<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Category.index', compact('categories'));
    }
    public function add()
    {
        return view('category/add_category');
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Category::create([
            'title' => $request->title,
        ]);

        return redirect()->route('category.index')->with('success', 'Added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->title,
        ]);


        return redirect()->route('category.index')->with('success', 'Категория успешно обновлена!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Категория успешно удалена!');
    }
}
