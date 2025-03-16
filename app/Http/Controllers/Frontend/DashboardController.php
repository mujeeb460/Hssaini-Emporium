<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;

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

    public function singleProduct($title)
    {
        $title = str_replace(' ', '-', $title);

       $product = Product::with('category','colors','storageCapacities')
        ->whereRaw('LOWER(REPLACE(slug, " ", "-")) LIKE ?', [strtolower('%' . $title . '%')])
        ->first();

        if($product)
        {                 

            $relatedProducts = $product->category->products;

            return view('frontend.singleProduct', compact('product', 'relatedProducts'));
        }else{
            return redirect('/');
        }
    }

    public function searchProduct(Request $request)
    {
        $slug = str_replace(' ', '-', $request->product_slug);

       $products = Product::with('category','colors','storageCapacities')
        ->whereRaw('LOWER(REPLACE(slug, " ", "-")) LIKE ?', [strtolower('%' . $slug . '%')])
        ->get();

        $data['product']['total'] = $products->count();

        if($products)
        {                 
            //$relatedProducts = $products->category->products;

            return view('frontend.search_product', compact('products','data'));
        }else{

            return redirect('/')->with(['success'=>'Product not listed']);
        }
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


    public function subscribe_newsletter(Request $request)
    {
        $data = array(
            'name' => 'Test',
            'address' => 'Test',
            'email' => $request->email,
            'password' => "Test123",
            'msg' => "Hello test",
        );
        
        // Mail::send('admin.mail.clinicregister', $data, function($message) use ($data){
        //     $message->to($data['email']);
        //     $message->subject(' Welcome! to elab-care App :: Clinic Register');
        //     $message->from('Elab-Pathology@elab-care.com');
        //   });

        Mail::raw('Test Email from Laravel', function ($message) {
            $message->to('mujeeb.rahujo123@gmail.com')
                    ->subject('SMTP Test')
                    ->from('info@hussainiemporium.com', 'Hussainin Emporium');
        });


        return "successfully send";

    }
}
