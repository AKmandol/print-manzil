<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function dashboard()
    {
        $stores = Store::with('categories')->where('user_id', Auth::id())->get();
        $products = Product::whereHas('store', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('category')->get();

        return view('merchant.dashboard',compact(['stores','products']));
    }

    public function createStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = Store::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return back()->withErrors(['success_msg_store' => $data->name.' store created successfully'])->withInput();
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'store_id' => 'required',
        ]);

        $data = Category::create([
            'name' => $request->category_name,
            'store_id' => $request->store_id,
        ]);

        return back()->withErrors(['success_msg_category' => $data->name.' category created successfully'])->withInput();
    }

    public function createProduct(Request $request)
    {  
        $request->validate([
            'product_name' => 'required',
            'store_id_product' => 'required',
            'category_id' => 'required',
        ]);

        $data = Product::create([
            'name' => $request->product_name,
            'store_id' => $request->store_id_product,
            'category_id' => $request->category_id,
        ]);

        return back()->withErrors(['success_msg_product' => $data->name.' category created successfully'])->withInput();
    }

    
}
