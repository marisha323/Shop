<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ProductColor;
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
    public function delete_color($productId, $colorId)
    {
        // Знайти зв'язок між продуктом і кольором у таблиці ProductColor
        $productColor = ProductColor::where('product_id', $productId)
            ->where('color_id', $colorId)
            ->first();

        // Якщо зв'язок знайдений, видалити його
        if ($productColor) {
            $productColor->delete();

            return response()->json(['success' => true]);
        }

        // Якщо зв'язок не знайдений, повернути помилку
        return response()->json(['success' => false, 'message' => 'Зв\'язок між продуктом і кольором не знайдено.']);
    }

}
