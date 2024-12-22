<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subCategories.childCategories'])->get();
        $products = Product::with('category')->orderby('id', 'desc')->get();

        $letestProducts = Product::orderby('id', 'desc')->limit(6)->get();
        $topRatedProducts = Product::inRandomOrder()->limit(6)->get();
        $reviewProducts = Product::inRandomOrder()->limit(6)->get();

        return view('frontend.index', compact('products', 'categories', 'letestProducts', 'topRatedProducts', 'reviewProducts'));
    }

    public function singleProduct($id,$title)
    {
        $title = str_replace(' ', '-', $title);

        $product = Product::with('category')
        ->where('id', $id)
        ->whereRaw('LOWER(REPLACE(title, " ", "-")) LIKE ?', [strtolower('%' . $title . '%')])
        ->first();                 


        $relatedProducts = $product->category->products;

        return view('frontend.singleProduct', compact('product', 'relatedProducts'));
    }
    public function shop($id = null)
    {
        $categories = Category::get();
        $products = new Product;
        if ($id) {
            $products = $products->where('category_id', $id);
        }
        $letestProducts = Product::orderby('id', 'desc')->limit(6)->get();
        $saleProducts = Product::inRandomOrder()->get();

        $data = [];

        $data['price']['min'] = $products->min('price');
        $data['price']['max'] = $products->max('price');
        $data['product']['total'] = $products->count();

        $products = $products->get();

        return view('frontend.shop', compact('products', 'categories', 'letestProducts', 'saleProducts', 'data'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
