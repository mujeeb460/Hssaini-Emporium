<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myorder()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $orders = Order::with('orderDetails')->where('user_id', auth()->id())->get();
        return view('frontend.myorder', compact('orders','user'));
    }
}
