<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
                             ->orWhere('stock', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'asc')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('backend.pages.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('backend.pages.products.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'unit' => 'required|string|in:kg,g,lb',
        'custom_unit' => 'nullable|numeric|min:1',
        'description' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'stock' => 'required|numeric|min:1',
        'product_code' => 'nullable|string|unique:products',
    ]);

    try {
        // Define conversion rates
        $conversionRates = [
            'kg' => 1,
            'g' => 0.001,
            'lb' => 2.20462,
        ];
        $stockInBaseUnit = $validatedData['stock'] * $conversionRates[$validatedData['unit']];

        // Save image to storage and get the filename
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        // Generate unique product code if not provided
        $validatedData['product_code'] = $validatedData['product_code'] ?: 'P-' . str_pad(Product::count() + 1, 2, '0', STR_PAD_LEFT);

        // Create the product
        Product::create(array_merge($validatedData, [
            'image' => $imageName,
            'stock' => $stockInBaseUnit,
        ]));

        return redirect()->route('backend.products.index')->with('success', 'Product created successfully!');
    } catch (\Exception $e) {
        Log::error("Product creation failed: " . $e->getMessage());
        return redirect()->back()->withErrors('Product creation failed. Please try again.');
    }
}


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.pages.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'unit' => 'required|string|in:kg,g,lb',
            'custom_unit' => 'required|numeric|min:1',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($id);

        try {
            $conversionRates = [
                'kg' => 1,
                'g' => 0.001,
                'lb' => 2.20462,
            ];
            $stockInBaseUnit = $validatedData['stock'] * $conversionRates[$validatedData['unit']];

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }

            $product->update(array_merge($validatedData, [
                'stock' => $stockInBaseUnit,
            ]));

            return redirect()->route('backend.products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error("Product update failed: " . $e->getMessage());
            return redirect()->back()->withErrors('Product update failed. Please try again.');
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully!');
    }
}
