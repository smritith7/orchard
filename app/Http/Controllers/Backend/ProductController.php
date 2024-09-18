<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use CreateProductsTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
     // Index method to display a list of products
        public function index()
        {
            $products = Product::all();
            return view('backend.pages.products.index', ['products' => $products]);
        }

        // Show method to display details of a specific product
        public function show($id)
        {
             $product = Product::findOrFail($id);
            return view('backend.pages.products.show', ['product' => $product]);
        }

        // Create method to display the form for creating a new product
        public function create()
        {
            return view('backend.pages.products.create');
        }

        // Store method to handle the creation of a new product
        public function store(Request $request)
        {

          $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'description' => 'required',
            ]);

            // Product::create($validatedData);
            Product::create([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
            ]);

            toastr()->success('Product has been saved successfully!', 'Congrats');

            return redirect()->route('backend.products.index');
        }

       // Edit method to display the form for editing a product
        public function edit($id)
        {
           $product = Product::findOrFail($id);
           return view('backend.pages.products.edit', ['product' => $product]);
        }

        // Update method to handle the updating of a product
        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'description' => 'required',
            ]);

            $product = Product::findOrFail($id);
            $product->update($validatedData);

            return redirect()->route('backend.products.index')->with('success', 'Product updated successfully!');
        }

       // Destroy method to handle the deletion of a product
        public function destroy($id)
        {
           $products = Product::findOrFail($id);
           $products->delete();

            return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully!');
        }
    }
