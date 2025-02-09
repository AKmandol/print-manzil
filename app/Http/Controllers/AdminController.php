<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('welcome', compact('stores'));
    }

    public function dashboard()
    {
        $merchants = User::where('role', 'merchant')->get();
        return view('admin.dashboard', compact('merchants'));
    }

    public function shop($shop)
    {
        //Log::info('Shop route accessed', ['shop' => $shop]);
        $store = Store::where('name', $shop)->firstOrFail();
        $categories = $store->categories()->with('products')->get();
        //dd($store,$categories);
        return view('shop.index', compact('store', 'categories'));
    }
}
