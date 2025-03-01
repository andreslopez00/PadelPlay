<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function dashboard()
    {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        $featuredProducts = Product::take(3)->get();
        return view('dashboard', compact('featuredProducts'));
    }
}