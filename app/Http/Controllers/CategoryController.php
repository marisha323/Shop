<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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

        return redirect()->route('category.add_category')->with('success', 'Added successffully!');
    }
}
