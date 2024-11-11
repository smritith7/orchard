<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $products = Product::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('price', 'like', "%{$search}%")
                             ->orWhere('unit', 'like', "%{$search}%")
                             ->orWhere('custom_unit', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('backend.pages.products.index', ['products' => $products]);
    }

    // Show method
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.pages.products.show', ['product' => $product]);
    }

    // Create method
    public function create()
    {
        return view('backend.pages.products.create');
    }

    // Store method
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'custom_unit' => 'required|string',
            'description' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //image upload
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        // Create method
        Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'unit' => $validatedData['unit'],
            'custom_unit' => $validatedData['custom_unit'],
            'description' => $validatedData['description'],
            'stock' => rand(0, 50),
            'image' => $imageName,
        ]);

        // toastr()->success('Product has been saved successfully!', 'Congrats');

        return redirect()->route('backend.products.index')->with('success', 'Product created successfully!');
    }

    // Edit method
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.pages.products.edit', ['product' => $product]);
    }

    // Update method
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'custom_unit' => 'required|string',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make img optional
        ]);

        $product = Product::findOrFail($id);


        if ($request->hasFile('img')) {
            //image upload
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $validatedData['image'] = $product->image;
        }


        $product->update($validatedData);

        return redirect()->route('backend.products.index')->with('success', 'Product updated successfully!');
    }

    // Destroy method
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully!');
    }
}
