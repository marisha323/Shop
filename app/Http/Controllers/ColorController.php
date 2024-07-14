<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('Color.index', compact('colors'));
    }

    public function create()
    {
        return view('color/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Color::create([
            'name' => $request->title,
        ]);

        return redirect()->route('color.index')->with('success', 'Added successfully!');
    }


    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('Color.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $color = Color::findOrFail($id);
        $color->update([
            'name' => $request->title,
        ]);


        return redirect()->route('color.index')->with('success', 'Color успешно обновлен!');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return redirect()->route('color.index')->with('success', 'Color успешно удален!');
    }

}
