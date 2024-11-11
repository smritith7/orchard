<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        //all products
        $products = Product::all();
        foreach ($products as $product) {
            $product->random_stock = rand(0, 50);
        }

        //total users count
        $totalUsers = User::count();
        $totalProducts = Product::count();

        //all users
        $users = User::all();// Fetch all users to display if needed

        $products = Product::all();// Fetch all products to display if needed


        return view('backend.pages.dashboard', compact('products', 'totalUsers', 'users','totalProducts', 'products',));
    }
}
