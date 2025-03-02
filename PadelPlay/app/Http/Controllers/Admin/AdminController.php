<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Court;

class AdminController extends Controller
{
    /**
     * Muestra el panel de administración.
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $productsCount = Product::count();
        $courtsCount = Court::count();

        return view('admin.dashboard', compact('usersCount', 'productsCount', 'courtsCount'));
    }
}
