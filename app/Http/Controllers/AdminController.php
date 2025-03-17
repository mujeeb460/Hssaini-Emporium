<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductStorageCapacity;
use App\Models\User;


class AdminController extends Controller
{
    
    public function dashboard()
    {
    	$total_customers = User::role('customer')->count();
    	$total_products = Product::count();
    	$total_categories = Category::count();
    	$total_orders = Order::count();
    	$complete_orders = Order::where('status','Delivered')->count();
    	$pending_orders = Order::where('status','Pending')->count();
    	$shipped_orders = Order::where('status','Shipped')->count();
    	$cancel_orders = Order::where('status','Canceled')->count();
    	$last_orders = Order::with('orderDetails')->latest()->take(5)->get();

        return view('dashboard', compact('total_customers','total_products','total_categories','total_orders','complete_orders','pending_orders','shipped_orders','cancel_orders','last_orders'));
    }
}
