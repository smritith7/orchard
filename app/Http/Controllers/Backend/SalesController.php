<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // sales index page
    public function index() {
        $sales = Sale::all();
        return view('backend.pages.sales.index', ['sales' => $sales]);
    }

    // Store
    public function store(Request $request) {

        // Validate request data
        $validateData = $request->validate([
            'customer_name' => 'required|max:255',
            'phone_no' => 'required|string|max:20',
            'total' => 'required|numeric',
            'paid' => 'required|numeric',
            'status' => 'required|string',
            'biller' => 'required|max:255',
        ]);


        Sale::create($validateData);

        return redirect()->route('backend.sales.index')->with('success', 'Sale created successfully!');
    }

    // Show
    public function show($id) {
        $sale = Sale::findOrFail($id);
        return view('backend.pages.sales.show', ['sale' => $sale]);
    }

    // Edit a sale
    public function edit($id) {
        $sale = Sale::findOrFail($id);
        return view('backend.pages.sales.edit', ['sale' => $sale]);
    }

    // Update
    public function update(Request $request, $id) {
        // Validate request data
        $validateData = $request->validate([
            'customer_name' => 'required|max:255',
            'phone_no' => 'required|string|max:20',
            'total' => 'required|numeric',
            'paid' => 'required|numeric',
            'status' => 'required|string',
            'biller' => 'required|max:255',
        ]);


        $sale = Sale::findOrFail($id);
        $sale->update($validateData);

        return redirect()->route('backend.sales.index')->with('success', 'Sale updated successfully!');
    }

    // Delete
    public function destroy($id) {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('backend.sales.index')->with('success', 'Sale deleted successfully!');
    }


}
