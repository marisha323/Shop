<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('Brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Brand::create([
            'name' => $request->title,
        ]);

        return redirect()->route('brand.index')->with('success', 'Added successfully!');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->title,
        ]);


        return redirect()->route('brand.index')->with('success', 'Color успешно обновлен!');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Color успешно удален!');
    }
}
