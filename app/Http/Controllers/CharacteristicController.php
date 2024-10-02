<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Characteristics;
use App\Models\Size;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    public function index()
    {
        $characteristics = Characteristics::all();
        return view('characteristics.index', compact('characteristics'));
    }

    public function create()
    {
        $sizes = Size::all();
        $brands = Brand::all();
        return view('characteristics.add', compact('sizes', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type_of_material' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'width' => 'required|string|max:255',
            'size_id' => 'required|exists:sizes,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Characteristics::create($request->all());

        return redirect()->route('characteristics.index')->with('success', 'Characteristic created successfully.');
    }

    public function edit($id)
    {
        $sizes = Size::all();
        $brands = Brand::all();
        $characteristic = Characteristics::findOrFail($id);
        return view('characteristics.edit', compact('characteristic', 'sizes', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type_of_material' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'width' => 'required|string|max:255',
            'size_id' => 'required|exists:sizes,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $characteristic = Characteristics::findOrFail($id);
        $characteristic->update([
            'title' => $request->title,
            'type_of_material' =>$request->type_of_material,
            'height' => $request->height,
            'width' => $request->width,
            'size_id' =>$request->size_id,
            'brand_id' =>$request->brand_id,
        ]);


        return redirect()->route('characteristics.index')->with('success', 'Характеристика успешно обновлена!');
    }

    public function destroy($id)
    {
        $characteristic = Characteristics::findOrFail($id);
        $characteristic->delete();

        return redirect()->route('characteristics.index')->with('success', 'Характеристика успешно удалена!');
    }
}
